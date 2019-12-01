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
            <form class="form-horizontal" action="<?php echo e(URL::to('/add-department')); ?>" method="post">
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
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Department Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="department_name" class="form-control" id="fname" placeholder="Enter Department Name Here" required="">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Add Department</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
    <div class="card">
        <form class="form-horizontal" action="<?php echo e(URL::to('/add-designation')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="card-body">
                <h4 class="card-title">Designation Info</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Designation Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="designation_name" class="form-control" id="fname" placeholder="Enter Designation Name Here" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Department</label>
                    <div class="col-sm-9">
                        <select name="department_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <?php 
                            $all_department=DB::table('tbl_department')
                                            ->get();
                            ?>
                            <?php $__currentLoopData = $all_department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_all_department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v_all_department->department_id); ?>"><?php echo e($v_all_department->department_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Add Designation</button>
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