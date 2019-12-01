@extends('manager_layout')
@section('manager_content')
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
            <h4 class="page-title">All  Employee List</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Employee</li>
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
            <h5 class="card-title">All Employee Information </h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Photo</th>
							<th>Employee Phone</th>
                            <th >Grade</th>
                            <th >Join Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach($all_employee as $v_all_employee) {?>
                        <tr>
							<td>{{$v_all_employee->employee_id}}</td>
                            <td>{{$v_all_employee->employee_name}}</td>
                            <td ><img src="{{URL::to($v_all_employee->employee_photo)}}" style="height:80px;width: 80px"></td>
                            <td>{{$v_all_employee->employee_phone}}</td>
                            <td>{{$v_all_employee->grade_name}}</td>
                            <td>{{$v_all_employee->employee_join_date}}</td>
                            <td>
                            	<a href="{{URL::to('/manager-employee-detail/'.$v_all_employee->employee_id)}}"><button type="button" class="btn btn-outline-primary">Detail</button></a>
                            	<a href="{{URL::to('/leave-form/'.$v_all_employee->employee_id)}}"><button type="button" class="btn btn-outline-success">Leave</button></a>
                            </td>
                        </tr>
                        <?php  
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Photo</th>
                            <th>Employee Phone</th>
                            <th >Grade</th>
                            <th >Join Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
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