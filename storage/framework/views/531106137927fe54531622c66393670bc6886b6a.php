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
            <h4 class="page-title">Supplier Order Record</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier Order detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <a href="<?php echo e(url('/supply-order-form/'.$supplier_order_detail_info->supplier_id)); ?>"><i class=" fas fa-angle-double-left">Back to Supplier Order</i></a>
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
            <form class="form-horizontal" action="<?php echo e(url('/update-supplier-order-detail/'.$supplier_order_detail_info->supplier_order_id)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Update Supplier Order Detail & Show Information</h4>
                     <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Date</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="date" data-toggle="tooltip" value="<?php echo e($supplier_order_detail_info->supply_date); ?>" title="Give Date!" class="form-control"  name="supply_date" placeholder="Hover For tooltip" >
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Product Name</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="text" class="form-control" value="<?php echo e($supplier_order_detail_info->supply_prduct_name); ?>" name="supply_product_name">
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
                                <input type="text" class="form-control" value="<?php echo e($supplier_order_detail_info->supply_chalan_number); ?>" name="supply_chalan_number" aria-label="Username" aria-describedby="basic-addon1">
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
                                <input type="text" class="form-control" value="<?php echo e($supplier_order_detail_info->supply_bill_number); ?>" name="supply_bill_number" aria-label="Username" aria-describedby="basic-addon1" >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Total Amount</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?php echo e($supplier_order_detail_info->supply_total_amount); ?>" name="supply_total_amount" aria-label="Recipient 's username" aria-describedby="basic-addon2"  >
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
                                <input type="text" class="form-control" value="<?php echo e($supplier_order_detail_info->supply_advance_amount); ?>" name="supply_advance_amount" aria-label="Recipient 's username" aria-describedby="basic-addon2" >
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">TK</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <select class="select2 form-control " name="supply_status" required="">
                        <option value="<?php echo e($supplier_order_detail_info->supply_status); ?>">Select Payment Type</option>
                        <option value="1">Due</option>
                        <option value="2">Paid</option>
                    </select>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Update Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-body">
            <h4 class="card-title">Supplier Information</h4>
            <div class="alert alert-success" role="alert">
              <h5>Company Name: <?php echo e($supplier_order_detail_info->supplier_name); ?></h5>
              <h5>Company Phone: <?php echo e($supplier_order_detail_info->supplier_phone); ?></h5>
              <h5>Company Email: <?php echo e($supplier_order_detail_info->supplier_email); ?></h5>
              <h5>Officer Name : <?php echo e($supplier_order_detail_info->officer_name); ?></h5>
              <h5>Officer Phone: <?php echo e($supplier_order_detail_info->officer_phone); ?></h5>
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