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
            <h4 class="page-title">Local Client Detail Information</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">local Client</li>
                    </ol>
                </nav>
            </div>
        </div>
        <a href="<?php echo e(url('/local-client-list')); ?>"><i class=" fas fa-angle-double-left">Back to Local Client List</i></a>
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
        <div class="col-md-8">
			<div class="card">
			    <form class="form-horizontal" action="<?php echo e(url('/update-local-client/'.$local_client_detail->client_id)); ?>" method="post">
			    	<?php echo e(csrf_field()); ?>

			        <div class="card-body">
			            <h4 class="card-title">Update Local Client</h4>
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
			                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Client Name</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="lclient_name" id="fname" value="<?php echo e($local_client_detail->name); ?>" >
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Client Phone Number</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="lclient_phone" maxlength="11" minlength="11" id="lname" value="<?php echo e($local_client_detail->phone); ?>">
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="email" class="col-sm-3 text-right control-label col-form-label">Client email</label>
			                <div class="col-sm-9">
			                    <input type="email" class="form-control" name="lclient_email" id="email1" value="<?php echo e($local_client_detail->email); ?>">
			                </div>
			            </div>
			            <h5>Address:<?php echo e($local_client_detail->address); ?></h5>
			            <div class="form-group row">
			                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Client Address</label>
			                <div class="col-sm-9">
			                    <textarea class="form-control" name="lclient_address"></textarea>
			                </div>
			            </div>
			        </div>
			        <div class="border-top">
			            <div class="card-body">
			                <button type="submit" class="btn btn-primary">Update Local Client</button>
			            </div>
			        </div>
			    </form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>