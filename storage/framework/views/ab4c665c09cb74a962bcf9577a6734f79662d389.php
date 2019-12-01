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
            <h4 class="page-title">Add Supplier Detail</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier Form </li>
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
        <div class="col-md-9">
            <div class="card">
                <form class="form-horizontal" action="<?php echo e(url('/add-supplier-detail')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-body">
                        <h4 class="card-title"> Supplier Information</h4>
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
                                <input type="text" class="form-control" name="company_name" id="fname" placeholder="Supplier Name Here" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Supplier Department</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="company_department" id="fname" placeholder="Supplier Department Here" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Supplier Phone </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="company_phone" maxlength="11" minlength="11" id="lname" placeholder="Phone Number Here(11 digit) " required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 text-right control-label col-form-label">Supplier email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="company_email" id="email1" placeholder="Supplier email Here.. example@gmail.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Supplier Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="company_address"></textarea>
                            </div>
                        </div>
                        <div class="progress m-t-15">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Officer Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="compliance_name" id="fname" placeholder="Officer Name Here" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Officer Phone </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="compliace_phone" minlength="11" maxlength="11" id="fname" placeholder="Officer Phone Number Here" >
                            </div>
                        </div>
                        <div class="progress m-t-15">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <h4>Order Detail</h4>
                        <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Date</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="date" data-toggle="tooltip" title="Give Date!" class="form-control"  name="date" placeholder="Hover For tooltip" required="">
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Product Name</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="text" class="form-control" name="product_name" placeholder="Product Name Here" required="">
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Chalan Number</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">#</span>
                                </div>
                                <input type="text" class="form-control" name="chalan_number" placeholder="Chalan Number.." aria-label="Username" aria-describedby="basic-addon1" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Bill Number</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">#</span>
                                </div>
                                <input type="text" class="form-control" name="bill_number" placeholder="Bill Number.." aria-label="Username" aria-describedby="basic-addon1" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Total Amount</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="total_amount" placeholder="Total Amount Here..." aria-label="Recipient 's username" aria-describedby="basic-addon2"  required="">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">TK</span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Advance Amount</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="advance_amount" placeholder="Advance Amount" aria-label="Recipient 's username" aria-describedby="basic-addon2" required="">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">TK</span>
                                </div>
                            </div>
                        </div>
                    </div>
					 <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Payment Status</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                 <select class="select2 form-control " name="status" required="">
									<option>Select Payment Status</option>
									<option value="1">Due</option>
									<option value="2">Paid</option>
								</select>
                            </div>
                        </div>
                    </div>
                   
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Save Supplier Information</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>