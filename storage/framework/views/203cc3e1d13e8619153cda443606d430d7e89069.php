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
            <h4 class="page-title">Roll Detail Information</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roll Detail</li>
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
    <div class="col-md-8">
        <div class="card">
            <form class="form-horizontal" action="<?php echo e(url('/update-roller')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Update Roll Information</h4>
                     <?php if(Session::has('message')): ?>
                    <div class="alert alert-success" role="alert">
                       <?php echo e(Session::get('message')); ?>

                   </div>
                    <?php elseif(Session::has('error')): ?>
                   <div class="alert alert-warning" role="alert">
                       <?php echo e(Session::get('error')); ?>

                   </div>
                    <?php endif; ?>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Roll Name</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="text" class="form-control" name="admin_name" value="<?php echo e($roller->admin_name); ?>">
                        </div>
                    </div>
                   <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Roll Email</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="email" class="form-control" name="admin_email" value="<?php echo e($roller->admin_email); ?>">
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Roll Phone</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="text" class="form-control" name="admin_phone" minlength="11" maxlength="11" value="<?php echo e($roller->admin_phone); ?>">
                        </div>
                    </div>
                    <div class="progress m-t-15">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                         <h4 class="card-title"> Username & Password</h4>
                        <div class="form-group row">
                            <label for="admin_user" class="col-sm-2 text-right control-label col-form-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text" disabled="" class="form-control" name="admin_user" id="admin_user" value="<?php echo e($roller->admin_user); ?>">
                            </div>
                            <label for="rate" class="col-sm-2 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-4">
                                <input type="Password" class="form-control" name="admin_password" id="rate" placeholder="Enter Password" required="">
                            </div>
                        </div>
                        <input type="hidden"  name="admin_type" value="<?php echo e($roller->admin_id); ?>">
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Update Roll</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <!-- card new -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-0">Roller Recent Detail</h4>
            </div>
            <ul class="list-style-none">
                <li class="card-body">
                    <a href="#" class="m-b-0 p-0">
                        <div class="d-flex no-block">
                            <i class="fa fa-check-circle w-30px m-t-5"></i>
                            <div>
                                <span class="font-bold">Name: <?php echo e($roller->admin_name); ?></span> 
                            </div>
                        </div>
                    </a>
                </li>
                <li class="card-body border-top">
                    <a href="#" class="m-b-0 p-0">
                        <div class="d-flex no-block">
                            <i class="fa fa-gift w-30px m-t-5"></i>
                            <div>
                                <span class="font-bold">Phone: <?php echo e($roller->admin_phone); ?></span>
                                
                            </div>
                        </div>
                    </a>
                </li>
                <li class="card-body border-top">
                    <a href="#" class="m-b-0 p-0">
                        <div class="d-flex no-block">
                            <i class="fa fa-plus w-30px m-t-5"></i>
                            <div>
                                <span class="font-bold">Email:<?php echo e($roller->admin_email); ?></span>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="card-body border-top">
                    <a href="#" class="m-b-0 p-0">
                        <div class="d-flex no-block">
                            <i class="fa fa-leaf w-30px m-t-5"></i>
                            <div>
                                <span class="font-bold">Username: <?php echo e($roller->admin_user); ?></span>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="card-body border-top">
                    <a href="#" class="m-b-0 p-0">
                        <div class="d-flex no-block">
                            <i class="fa fa-user w-30px m-t-5"></i>
                            <div>
                                <span class="font-bold">Roller Type:<?php echo e(trim($roller->admin_type)); ?></span>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="card-body border-top">
                    <a href="#" class="m-b-0 p-0">
                        <div class="d-flex no-block">
                            <i class="fa fa-user w-30px m-t-5"></i>
                            <div>
                                <span class="font-bold">Password:<?php echo e(trim($roller->admin_password)); ?></span>
                            </div>
                        </div>
                    </a>
                </li>

            </ul>
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