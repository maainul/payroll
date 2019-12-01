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
            <h4 class="page-title">Client Order Record</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Client Order detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <a href="<?php echo e(url('/order-form/'.$client_order_detail_info->client_id)); ?>"><i class=" fas fa-angle-double-left">Back to Client Order</i></a>
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
            <form class="form-horizontal" action="<?php echo e(url('/update-order-detail/'.$client_order_detail_info->order_id)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Update Order Detail</h4>
                    <p style="color: #95c110">Order Create at: <?php echo e($client_order_detail_info->created_at); ?></p>
                    <p style="color: #11c1a1">Order Update at: <?php echo e($client_order_detail_info->updated_at); ?></p>
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
                            <span>Date</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="date" data-toggle="tooltip" value="<?php echo e($client_order_detail_info->date); ?>" title="Give Date!" class="form-control"  name="date" placeholder="Hover For tooltip" >
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Product Name</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="text" class="form-control" value="<?php echo e($client_order_detail_info->product_name); ?>" name="product_name">
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
                                <input type="text" class="form-control" value="<?php echo e($client_order_detail_info->chalan_number); ?>" name="chalan_number" aria-label="Username" aria-describedby="basic-addon1">
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
                                <input type="text" class="form-control" value="<?php echo e($client_order_detail_info->bill_number); ?>" name="bill_number" aria-label="Username" aria-describedby="basic-addon1" >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Total Amount</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?php echo e($client_order_detail_info->total_amount); ?>" name="total_amount" aria-label="Recipient 's username" aria-describedby="basic-addon2"  >
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
                                <input type="text" class="form-control" value="<?php echo e($client_order_detail_info->advance_amount); ?>" name="advance_amount" aria-label="Recipient 's username" aria-describedby="basic-addon2" >
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">TK</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Discount</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?php echo e($client_order_detail_info->discount); ?>" name="discount" aria-label="Recipient 's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">TK</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <select class="select2 form-control " name="status" required="">
                        <option value="<?php echo e($client_order_detail_info->status); ?>">Select Payment Type</option>
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
            <?php if($client_order_detail_info->type==1): ?>
            <h3 class="card-title">Local Client Information</h3>
            <div class="alert alert-success" role="alert">
              <h5>Name: <?php echo e($client_order_detail_info->name); ?></h5>
              <h5>Phone: <?php echo e($client_order_detail_info->phone); ?></h5>
              <h5>Email: <?php echo e($client_order_detail_info->email); ?></h5>
            </div>
            <?php else: ?>
            <h4 class="card-title">Corporate Client Information</h4>
            <div class="alert alert-success" role="alert">
              <h5>Company Name: <?php echo e($client_order_detail_info->name); ?></h5>
              <h5>Company Phone: <?php echo e($client_order_detail_info->phone); ?></h5>
              <h5>Company Email: <?php echo e($client_order_detail_info->email); ?></h5>
              <h5>Officer Name : <?php echo e($client_order_detail_info->compliance_name); ?></h5>
              <h5>Officer Phone: <?php echo e($client_order_detail_info->compliance_phone); ?></h5>
            </div>
            <?php endif; ?>  
            <h4 class="card-title">Product Rate</h4>
            <div class="alert alert-info" role="alert">
            <?php
            $single_clients_products=DB::table('tbl_product')
            ->where('client_id',$client_order_detail_info->client_id)
            ->get();
            foreach($single_clients_products as $v_product_single){?>
                <h5><?php echo e($v_product_single->product_name); ?>=<?php echo e($v_product_single->product_rate); ?></h5>
            <?php } ?>
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