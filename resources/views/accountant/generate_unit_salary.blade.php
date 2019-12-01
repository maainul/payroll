@extends('pdf_layout')
@section('pdf_content')
<?php use Carbon\Carbon;?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
@foreach($employee_salary as $v_employee)
<div class="container">
    <h3 style="text-align: center;">BEXIMCO Industrial Park</h3>
    <h4 style="text-align: center;">Office:{{$office->office_name}}</h4>
    <h4 style="text-align: center;">Unit:{{$office->unit_name}}</h4>
    <h3 style="text-align: center;">Salary Month:{{Carbon::now()->format('F-Y')}}</h3>
<div class="row">
      <div class="col-md-8">
        <h5>Employee Name:{{$v_employee->employee_name}}</h5>
        <h5>Department:{{$v_employee->department_name}}</h5>
        <h5>Designation:{{$v_employee->designation_name}}</h5>
      </div> 
    <div class="col-md-4">
         <img src="{{URL::to($v_employee->employee_photo)}}"  height="80" width="100" class="center">
        
    </div>
</div>
 <h4 style="text-align: center;">Salary Detail</h4>
    <table style="width:100%">
        <thead>
            <tr>
                <th>Basic Salary</th>
                <th>Attendance</th>
                <th>Others</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    Basic:{{$total_basic=$v_employee->total_salary}}TK CD:{{$dayofmonth=Carbon::now()->daysInMonth}}
                </td>
                <td>
                <?php $employee_att=DB::table('tbl_attendance')
                ->where('employee_id',$v_employee->employee_id)
                ->whereMonth('attendance_date',Carbon::now()->month)
                ->where('attendance_status','present')
                ->get(); ?>
                Present:{{$attend=$employee_att->count('id')}}day
                </td>
                <td>
                 @if($attend=='22')
                Attend Bonus:{{$attd_bonus=1000}} TK<br>
                @else
                Attend Bonus:{{$attd_bonus=0 }}TK<br>
                @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    Per day:{{$per_day_basic=intval($total_basic/$dayofmonth)}} 
                </td>
                <td>
                   <?php $employee_abs=DB::table('tbl_attendance')
                ->where('employee_id',$v_employee->employee_id)
                ->whereMonth('attendance_date',Carbon::now()->month)
                ->where('attendance_status','absent')
                ->count(); ?>
                Absent:{{$absent=$employee_abs}}day
                </td>
                <td>
                   <?php $numberOfHours = DB::table('tbl_attendance')
                                ->where('employee_id', $v_employee->employee_id)
                                ->where('attendance_status', 'present')
                                ->whereMonth('attendance_date',Carbon::now()->month)
                                ->whereNotNull('in_time')
                                ->whereNotNull('out_time')
                                ->select(DB::raw('SUM(time_to_sec(timediff(out_time, in_time)) / 3600) as result '))
                                ->get(); ?>
                     @foreach($numberOfHours as $w)
                        TotalHour:{{ $total=intval($w->result) }}<br>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                     Basic Salary:{{$v_employee->basic_salary}} 
                </td>
                <td>
                    <?php $leave_number=DB::table('tbl_leave')
                        ->whereMonth('leave_date',Carbon::now()->month)
                        ->where('employee_id',$v_employee->employee_id)
                        ->count('employee_id'); ?>
                     Leave:{{$leave_number}}
                </td>
                <td>
                     Overtime: {{$overtime=$total-($attend*9)}}Hour
                </td>
               <td></td>
            </tr>
            <tr>
                <td>
                    Home Rent:{{$v_employee->home_rent}}TK
                </td>
                <td>
                    <?php $shift_night=DB::table('tbl_attendance')
                            ->where('employee_id',$v_employee->employee_id)
                            ->whereMonth('attendance_date',Carbon::now()->month)
                            ->where('shift_id','night')
                            ->count();?>
                    Night Shift: {{$shift_night}} Day
                </td>
                 <td>
                     OT Rate:  {{ $p_ot=$v_employee->ot_rate}}*{{$overtime}} ={{$ot_rate=$p_ot*$overtime}} TK
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                   Medical:{{$v_employee->medical_allowance}}TK
                </td>
                <td></td>
                <td>
                     Night Allowance:{{$night_bonus=$shift_night*100}}
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                   Transport:{{$v_employee->transport_allowance}}TK
                </td>
                <td></td>
                <td>
                    <?php  $leave_number=DB::table('tbl_leave')
                                ->whereMonth('leave_date',Carbon::now()->month)
                                ->where('employee_id',$v_employee->employee_id)
                                ->count('employee_id'); ?>
                    Leave Allowance:{{$height_leave=$v_employee->holiday-$leave_number}} * {{$leave_bonus=$v_employee->holiday_bonus}} =        
                    @if($leave_number > $height_leave)
                    {{$leave_bon=0}}<br>
                    @else
                    {{$leave_bon=($height_leave-$leave_number)*$leave_bonus}}<br>
                    @endif
                </td>
                <td></td>
            </tr>
             <tr>
                <td>
                   Lunch:{{$v_employee->lunch_allowance}}TK
                </td>
                <td></td>
                <td>Fine: {{$fine=$absent*($per_day_basic/2)}}</td>
                <td></td>
            </tr>
            <tr>
                <td>
                   Overtime Rate:{{$p_ot=$v_employee->ot_rate}}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    Max Leave:{{$height_leave=$v_employee->holiday}}day
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    Leave Bonus:{{$leave_bonus=$v_employee->holiday_bonus}}tk
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Total: 8000TK</th>
                <th></th>
                <th>{{$other=($attd_bonus+$ot_rate+$night_bonus+$leave_bon)-$fine}}TK</th>
                <th>{{($per_day_basic*$attend)+$other}}</th>
            </tr>
        </tfoot>
    </table>
    <div class="row">
        <div class="col-md-4">
            <br><br><br>

          <center>--------------------------</center>
            <center>Employee Signiture</center> <br>
        </div>
        <div class="col-md-4">
             <br><br><br>
            <center>--------------------------</center>
            <center>Accounce</center> <br>
        </div>
         <div class="col-md-4">
             <br><br><br>
            <center>--------------------------</center>
            <center>Manager</center> <br>
        </div>
    </div>
 @endforeach
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>

@endsection