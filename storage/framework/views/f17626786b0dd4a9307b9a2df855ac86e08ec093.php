<?php $__env->startSection('admin_content'); ?>
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
            <h4 class="page-title">Update About US</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
            <form class="form-horizontal" action="<?php echo e(url('/update-about-us')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Update About Us </h4>
                    <p class="alert-success">
                    <?php
                    $message=Session::get('message');
                    
                    if($message)
                    {
                        echo $message;
                        Session::put('message',NULL);
                    }
                    ?>
                    </p>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">About Us Title</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="about_title"><?php echo e($show_about_us->about_title); ?></textarea>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">About Us Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="about_description"><?php echo e($show_about_us->about_description); ?></textarea>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">About Us Message</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="about_message"><?php echo e($show_about_us->about_message); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Update About</button>
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