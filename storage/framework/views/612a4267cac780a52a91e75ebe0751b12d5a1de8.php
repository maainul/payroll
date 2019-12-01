<?php $__env->startSection('accountant_content'); ?>
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
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
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
                            <th>Employee Name</th>
							<th>Employee Phone</th>
                            <th >Designation</th>
                            <th >Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach($all_employee as $v_all_employee) {?>
                        <tr>
                            <td><?php echo e($v_all_employee->employee_name); ?></td>
                            <td><?php echo e($v_all_employee->employee_phone); ?></td>
                            <td><?php echo e($v_all_employee->designation_name); ?></td>
                            <td><?php echo e($v_all_employee->grade_name); ?></td>
                            <td>
                            	<a href="<?php echo e(URL::to('/emplolyee-salary/'.$v_all_employee->employee_id)); ?>"><button type="button" class="btn btn-outline-primary">Salary</button></a>
                            </td>
                        </tr>
                        <?php  
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Employee Name</th>
                            <th>Employee Phone</th>
                            <th>Designation</th>
                            <th>Grade</th>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>