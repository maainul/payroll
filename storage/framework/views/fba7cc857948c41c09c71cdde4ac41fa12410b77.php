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
            <h4 class="page-title">Update Client Rate Record</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Rate </li>
                    </ol>
                </nav>
            </div>
        </div>
        <a href="<?php echo e(url('/rate-form/'.$client_rate_info->client_id)); ?>"><i class=" fas fa-angle-double-left">Back to Client Rate</i></a>
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
            <form class="form-horizontal" action="<?php echo e(url('/update-client-rate/'.$client_rate_info->product_id),$client_rate_info->client_id); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Update Client Rate</h4>
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
                     <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Product Name</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="text" class="form-control" disabled="" name="product_name" value="<?php echo e($client_rate_info->product_name); ?>">
                        </div>
                    </div>
                     <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Product Rate</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="product_rate" value="<?php echo e($client_rate_info->product_rate); ?>" aria-label="Recipient 's username"  aria-describedby="basic-addon2" required="">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">TK</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Update Rate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        <?php
        $client_info=DB::table('tbl_client')
        ->where('client_id',$client_rate_info->client_id)
        ->first();
        ?>
    <div class="col-md-4">
        <div class="card-body">
            <h3 class="card-title">Client Information</h3>
            <div class="alert alert-success" role="alert">
              <h5>Name: <?php echo e($client_info->name); ?></h5>
              <h5>Phone: <?php echo e($client_info->phone); ?></h5>
              <h5>Email: <?php echo e($client_info->email); ?></h5>
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
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>