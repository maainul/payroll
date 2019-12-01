<?php $__env->startSection('admin_content'); ?>
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
            <h4 class="page-title">All  Grade List</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Grade</li>
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
            <h5 class="card-title">All Grade List</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
							 <th>Grade Name</th>
                            <th>Total Salary</th>
                            <th >Basic Salary</th>
                            <th >Home Rent</th>
                            <th >Medical Allowance</th>
                            <th >Transport Allowance</th>
                            <th >Lunch Allowance</th>
                            <th >Overtime Rate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach($all_grade as $v_all_grade) {?>
                        <tr>
							<td><?php echo e($v_all_grade->grade_name); ?></td>
                            <td><?php echo e($v_all_grade->total_salary); ?></td>
                            <td><?php echo e($v_all_grade->basic_salary); ?></td>
                            <td><?php echo e($v_all_grade->home_rent); ?></td>
                            <td><?php echo e($v_all_grade->medical_allowance); ?></td>
                            <td><?php echo e($v_all_grade->transport_allowance); ?></td>
                            <td><?php echo e($v_all_grade->lunch_allowance); ?></td>
                            <td><?php echo e($v_all_grade->ot_rate); ?></td>
                            <td>
                            	<a href="<?php echo e(URL::to('')); ?>"><button type="button" class="btn btn-outline-primary">Update</button></a>
                            	<a href="<?php echo e(URL::to('')); ?>"><button type="button" class="btn btn-outline-success">Delete</button></a>
                            </td>
                        </tr>
                        <?php  
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                             <th>Grade Name</th>
                            <th >Total Salary</th>
                            <th >Basic Salary</th>
                            <th >Home Rent</th>
                            <th >Medical Allowance</th>
                            <th >Transport Allowance</th>
                            <th >Lunch Allowance</th>
                            <th >Overtime Rate</th>
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
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>