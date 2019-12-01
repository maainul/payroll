<?php $__env->startSection('manager_content'); ?>
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
            <h4 class="page-title">  Employee Information</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Employee Detail</li>
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
            <div class="row">
                <div class="col-md-6">
                    <center><h2><u>Current Information for This Month</u></h2></center>
                    <h3>Leave Information</h3>
                    <h5>Total Leave: <?php echo e($employee_leave); ?></h5>
                    <h3>Grade Information</h3>
                    <h5>Grade:<?php echo e($employee_Detail->grade_name); ?></h5>
                    <h5>Basic: <?php echo e($employee_Detail->total_salary); ?> TK</h5>
                    <h5>Ot Rate: <?php echo e($employee_Detail->ot_rate); ?> TK</h5>
                    <h5>Holiday Bonus: <?php echo e($employee_Detail->holiday_bonus); ?> TK</h5>
                    <h5>Holiday Bonus: <?php echo e($employee_Detail->holiday_bonus); ?> TK</h5>
                </div>
                <div class="col-md-4">
                    <center><img src="<?php echo e(URL::to($employee_Detail->employee_photo)); ?>" height="150px" width="180px"></center>
                    <hr>
                    <center><h3><?php echo e($employee_Detail->employee_name); ?></h3></center>
                    <h4>Designation:<?php echo e($employee_Detail->designation_name); ?> </h4>
                    <h4>Department:<?php echo e($employee_Detail->department_name); ?> </h4>
                    <h4 style="color: red;"><i class="fas fa-mobile-alt" ></i>: <?php echo e($employee_Detail->employee_phone); ?></h4>
                    <h4><i class="fas fa-envelope"></i>: <?php echo e($employee_Detail->employee_email); ?></h4>
                    <h4><i class="fas fa-calendar-alt"></i>: <?php echo e($employee_Detail->employee_join_date); ?></h4>
                    <h4>Status: <?php echo e($employee_Detail->employee_status); ?></h4>
                    <h4>Shift: <?php echo e($employee_Detail->shift_name); ?></h4>
                    <h4><i class="fas fa-birthday-cake"></i>:<?php echo e(Carbon::parse($employee_Detail->employee_date_of_birth)->format('d-m-Y')); ?></h4>
                    <h5><i class="fas fa-address-card">: <?php echo e($employee_Detail->employee_nid); ?></i></h5>
                    <h5>Father: <?php echo e($employee_Detail->employee_father_name); ?></i></h5>
                    <h5>Mother: <?php echo e($employee_Detail->employee_mother_name); ?></i></h5>
                    <h5>Present Address:<?php echo e($employee_Detail->employee_present_address); ?></i></h5>
                    <h5>Parmanent Address:<?php echo e($employee_Detail->employee_parmanent_address); ?></i></h5>
                </div>
                
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
<?php echo $__env->make('manager_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>