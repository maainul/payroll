@extends('accountant_layout')
@section('accountant_content')
<?php use Carbon\Carbon; ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h3 class="page-title">Employee Salary</h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/accountant')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employee</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@if (Session::has('message'))
<div class="alert alert-success" role="alert">
   <h4>{{Session::get('message')}}</h4>
</div>
@elseif (Session::has('error'))
<div class="alert alert-warning" role="alert">
   <h4>{{Session::get('error')}}</h4>
</div>
@endif
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        @if($salary_check==1)
        
            <center>
                <a href="{{url('/show-employee-salary-pdf/'.$employee_salary->employee_id)}}" class="btn btn-success" target="blank">Print</a>
            </center>
        @endif
        <h4 style="text-align: center;"> Employee Name: {{$employee_salary->employee_name}}</h4>
         <center><img src="{{URL::to($employee_salary->employee_photo)}}"  height="80" width="100" ></center> 
            <h5 style="text-align: center;">
            Grade:{{$employee_salary->grade_name}}, Department:{{$employee_salary->department_name}}<br>
            Designation:{{$employee_salary->designation_name}}<br>
        </h5>
         <h5 style="text-align: center;">Salary Month:{{Carbon::now()->format('F-Y')}}</h5>
         @if($salary_check==0)
         <h5 style="text-align: center;">Salary Status: Not Paid Yet</h5>
         @else
         <h5 style="text-align: center; color: red;">Salary Status: Already Paid</h5>
         @endif
    </div>
    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table  class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Attendance</th>
                            <th>Total Salary</th>
                            <th>Grade Detail</th>
                            <th>Extra Income</th>
                            <th>Sub Total</th>
                            <th>Fine</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td>
                                Present:{{$attend=$employee_att->count('id')}}day<br>
                                Leave:{{$leave_number}}<br>
                                Absent:{{$absent=$employee_abs}}day<br>
                                Calander Day:{{$dayofmonth=Carbon::now()->daysInMonth}} day
                            </td>
                            <td>
                                Basic:{{$total_basic=$employee_salary->total_salary}}TK<br>
                                Per day:{{$per_day_basic=intval($total_basic/$dayofmonth)}}
                            </td>
                            <td> 
                                Basic Salary:{{$employee_salary->basic_salary}}TK<br>
                                Home Rent:{{$employee_salary->home_rent}}TK<br>
                                Festible Bonus:{{$ft=$employee_salary->festible_bonus}}TK<br>
                                ---Allowance---<br>
                                Medical:{{$employee_salary->medical_allowance}}TK<br>
                                Transport:{{$employee_salary->transport_allowance}}TK<br>
                                Lunch:{{$employee_salary->lunch_allowance}}TK<br>
                                Overtime Rate:{{$p_ot=$employee_salary->ot_rate}}per hour<br>
                                Max Leave:{{$height_leave=$employee_salary->holiday}}day<br>
                                Leave Bonus:{{$leave_bonus=$employee_salary->holiday_bonus}}tk
                            </td>
                            
                            <td> 
                                @if($attend=='22')
                                Attend Bonus:{{$attd_bonus=1000}} TK<br>
                                @else
                                 Attend Bonus:{{$attd_bonus=0 }}TK<br>
                                 @endif
                                 @foreach($numberOfHours as $w)
                                    TotalHour:{{ $total=intval($w->result) }}<br>
                                @endforeach
                                Overtime: {{$overtime=($attend*9)-$total}}Hour<br>
                                OT Rate: {{$ot_rate=$p_ot*$overtime}} TK<br>
                                Night:{{$shift_night}} Day<br>
                                Night Allowance:{{$night_bonus=$shift_night*100}}<br>
                                @if($leave_number > $height_leave)
                                Leave Allowance:{{$leave_bon=0}}<br>
                                @else
                                Leave Allowance:{{$leave_bon=($height_leave-$leave_number)*$leave_bonus}}<br>
                                @endif
                                 @if($festible->festible=='yes' && $join_date>=12 )
                                Festible Bonus:{{ $festible_bonus=$ft}}
                                @else
                                Festible Bonus:{{$festible_bonus=0}}
                                @endif
                            </td>
                            <td>{{$sub=($per_day_basic*$attend)+$attd_bonus+$ot_rate+$night_bonus+$leave_bon+$festible_bonus}} </td>
                            <td> {{$fine=$absent*($per_day_basic/2)}}</td>
                            <td>{{$total_paid_salary=$sub-$fine}} </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Attendance</th>
                            <th>Total Salary</th>
                            <th>Grade Detail</th>
                            <th>Extra Income</th>
                            <th>SubTotal</th>
                            <th>Fine</th>
                            <th> Total</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<hr>
<?php $bonus=$attd_bonus+$ot_rate+$night_bonus+$leave_bon+$festible_bonus ?>
<form action="{{url('/pay-salary')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="employee_id" value="{{$employee_salary->employee_id}}">
    <input type="hidden" name="unit_id" value="{{$employee_salary->unit_id}}">
    <input type="hidden" name="office_id" value="{{$employee_salary->office_id}}">
    <input type="hidden" name="grade_id" value="{{$employee_salary->grade_id}}">
    <input type="hidden" name="designation_id" value="{{$employee_salary->designation_id}}">
    <input type="hidden" name="department_id" value="{{$employee_salary->department_id}}">
    <input type="hidden" name="bonus" value="{{$bonus}}">
    <input type="hidden" name="fine" value="{{$fine}}">
    <input type="hidden" name="total_salary" value="{{$total_paid_salary}}">
    @if($salary_check==0)
    <center><input class="btn btn-danger btn-lg" type="submit" name="submit" value="Pay Salary"></center>
    @endif
</form>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<script type="text/javascript">
    printme(){
        window.print();
    }
</script>
@endsection