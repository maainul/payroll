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
            <h4 class="page-title">Supplier Detail</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier</li>
                    </ol>
                </nav>
            </div>
        </div>
        <a href="<?php echo e(url('/supplier-list')); ?>"><i class=" fas fa-angle-double-left">Back to Supplier List</i></a>
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
			    <form class="form-horizontal" action="<?php echo e(url('/update-supplier-info/'.$supplier_detail->supplier_id)); ?>" method="post">
			    	<?php echo e(csrf_field()); ?>

			        <div class="card-body">
			            <h4 class="card-title">Update Supplier Detail & View</h4>
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
			                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Supplier Name</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="supplier_name" id="fname" value="<?php echo e($supplier_detail->supplier_name); ?>">
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Supplier Department</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="supplier_department" id="fname" value="<?php echo e($supplier_detail->supplier_department); ?>">
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Supplier Phone </label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="supplier_phone" maxlength="11" minlength="11" id="lname" value="<?php echo e($supplier_detail->supplier_phone); ?>">
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="email" class="col-sm-3 text-right control-label col-form-label">Supplier email</label>
			                <div class="col-sm-9">
			                    <input type="email" class="form-control" name="supplier_email" id="email1" value="<?php echo e($supplier_detail->supplier_email); ?>">
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Supplier Address</label>
			                <div class="col-sm-9">
			                    <textarea class="form-control" name="supplier_address"><?php echo e($supplier_detail->supplier_address); ?></textarea>
			                </div>
			            </div>
			            <div class="progress m-t-15">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    	<br>
			            <div class="form-group row">
			                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Officer Name</label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="officer_name" id="fname" value="<?php echo e($supplier_detail->officer_name); ?>">
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Officer Phone </label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control" name="officer_phone" minlength="11" maxlength="11" id="fname" value="<?php echo e($supplier_detail->officer_phone); ?>">
			                </div>
			            </div>
			        </div>
			        <div class="border-top">
			            <div class="card-body">
			                <button type="submit" class="btn btn-primary">Update Supplier Info</button>
			            </div>
			        </div>
			    </form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>