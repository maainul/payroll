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
            <h4 class="page-title">Salary Paid in Unit </h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Unit Salary</li>
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
            <h5 class="card-title">Salary Paid for unit</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Bonus</th>
							<th>Fine</th>
                            <th >Total Salary</th>
                            <th >Issue Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach($total_salary as $v_all_employee) {?>
                        <tr>
                        <?php $employee=DB::table('tbl_employee')
                                        ->where('employee_id',$v_all_employee->employee_id)
                                        ->first();
                        ?>
                            <td>{{$employee->employee_name}}</td>
                            <td>{{$v_all_employee->bonus}}</td>
                            <td>{{$v_all_employee->fine}}</td>
                            <td>{{$v_all_employee->total_salary}}</td>
                            <td>{{$v_all_employee->created_at}}</td>
                        </tr>
                        <?php  
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>{{$total_salary->sum('bonus')}} BDT</th>
                            <th>{{$total_salary->sum('fine')}} BDT</th>
                            <th>{{$total_salary->sum('total_salary')}} BDT</th>
                            <th></th>
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