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
            <h4 class="page-title">Update Unit</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Office</li>
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
    <div class="col-md-6">
    <div class="card">
        <form class="form-horizontal" action="<?php echo e(URL::to('/update-unit')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="card-body">
                <h4 class="card-title">Unit Info</h4>
                  <?php
                $message=Session::get('message');
                
                if($message)
                {
                    echo $message;
                    Session::put('message',NULL);
                }
                ?>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Unit Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="unit_name" class="form-control" id="fname" value="<?php echo e($all_unit->unit_name); ?>">
                        <input type="hidden" name="unit_id" value="<?php echo e($all_unit->unit_id); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Office</label>
                    <div class="col-sm-9">
                        <select name="office_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <option value="<?php echo e($all_unit->office_id); ?>"><?php echo e($all_unit->office_name); ?></option>
                            <?php
                        $all_office=DB::table('tbl_office')
                        ->get();
                        ?>
                            <?php $__currentLoopData = $all_office; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_show_office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v_show_office->office_id); ?>"><?php echo e($v_show_office->office_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Update Unit</button>
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