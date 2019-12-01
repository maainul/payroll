@extends('data_layout')
@section('data_content')
<?php 
use Carbon\Carbon;
 ?>
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
            <h4 class="page-title">Take Addendance</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
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

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> Employee List For Attendance</h5>
             <h2 class="text-center" style="color: #2d5596"> Attendance taken for: {{Carbon::parse($attend_date)->format('d-m-Y')}}</h2>
            <div class="table-responsive">
                 <form action="{{url('/take-attendance')}}" method="post">
                    {{csrf_field()}}
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#SN</th>
							 <th>Employee Name</th>
                            <th>Designation </th>
                            <th> Status</th>
                            <th> In Time</th>
                            <th> Out Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach($attendance_employee as $v_attend_employee) {?>
                        <tr>
                            <td>{{$i}}</td>
							<td>{{$v_attend_employee->employee_name}}</td>
                            <td>{{$v_attend_employee->designation_name}}
                                <input type="hidden" name="employee_id[]" value="{{$v_attend_employee->employee_id}}">
                            </td>
                            <td>
                            	<select name="attendance[{{$v_attend_employee->employee_id}}]" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                </select>
                            </td>
                            <td><input type="time" name="att_in[{{$v_attend_employee->employee_id}}]" value="08:00"></td>
                            <td><input type="time" name="att_out[{{$v_attend_employee->employee_id}}]" value="17:00"></td>
                        </tr>
                        <?php  $i++;
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#SN</th>
                             <th>Employee Name</th>
                            <th>Designation </th>
                            <th> Status</th>
                            <th> In Time</th>
                            <th> Out Time</th>
                        </tr>
                    </tfoot>
                </table>
                <input type="hidden" name="attend_date" value="{{$attend_date}}">
                <input type="hidden" name="unit" value="{{$unit}}">
                <input type="hidden" name="shift" value="{{$shift}}">
                 <button type="submit" name="submit" class="btn btn-primary">Take Attendance</button>
            </form>
            </div>

        </div>
    </div>

<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
@endsection