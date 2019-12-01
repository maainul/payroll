<?php $__env->startSection('admin_content'); ?>
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
            <h4 class="page-title">Department & Designation</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Designation</li>
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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="<?php echo e(URL::to('/add-grade')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Department Info</h4>
                      <?php
                    $message=Session::get('message');
                    
                    if($message)
                    {
                        echo $message;
                        Session::put('message',NULL);
                    }
                    ?>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Grade Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="grade_name" class="form-control" id="fname" placeholder="Enter Grade Name Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Total Salary</label>
                        <div class="col-sm-9">
                            <input type="text" name="total_salary" class="form-control" id="fname" placeholder="Enter Total Salary Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Basic Salary</label>
                        <div class="col-sm-9">
                            <input type="text" name="basic_salary" class="form-control" id="fname" placeholder="Enter Basic  Salary Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Home Rent</label>
                        <div class="col-sm-9">
                            <input type="text" name="home_rent" class="form-control" id="fname" placeholder="Enter Home Rent Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Medical Allowance</label>
                        <div class="col-sm-9">
                            <input type="text" name="medical_allowance" class="form-control" id="fname" placeholder="Enter Medical Allowance Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Transport Allowance</label>
                        <div class="col-sm-9">
                            <input type="text" name="transport_allowance" class="form-control" id="fname" placeholder="Enter Transport Allowance Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Lunch Allowance</label>
                        <div class="col-sm-9">
                            <input type="text" name="lunch_allowance" class="form-control" id="fname" placeholder="Enter Lunch Allowance Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Over time Rate</label>
                        <div class="col-sm-9">
                            <input type="text" name="ot_rate" class="form-control" id="fname" placeholder="Enter Over time Rate Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Holiday Bonus</label>
                        <div class="col-sm-9">
                            <input type="number" name="holiday_bonus" class="form-control" id="fname" placeholder="Enter Holiday Bonus Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Max Holyday</label>
                        <div class="col-sm-9">
                            <input type="number" name="holiday" class="form-control" id="fname" placeholder="Enter Holiday Bonus Here" required="">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Add Grade</button>
                    </div>
                </div>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>