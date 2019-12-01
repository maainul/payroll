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
            <h4 class="page-title">Client Order Record</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Client Order Status</li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php if($single_client_info->type==1): ?>
        <a href="<?php echo e(url('/local-client-list')); ?>"><i class=" fas fa-angle-double-left">Back to Local Client List</i></a>
        <?php else: ?>
        <a href="<?php echo e(url('/corporate-client-list')); ?>"><i class=" fas fa-angle-double-left">Back to Corporate Client List</i></a>
        <?php endif; ?>
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
            <form class="form-horizontal" action="<?php echo e(url('/add-local-client-order/'.$single_client_info->client_id)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Place Client Order </h4>
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
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-body">
            <?php if($single_client_info->type==1): ?>
            <h3 class="card-title">Local Client Information</h3>
            <div class="alert alert-success" role="alert">
              <h5>Name: <?php echo e($single_client_info->name); ?></h5>
              <h5>Phone: <?php echo e($single_client_info->phone); ?></h5>
              <h5>Email: <?php echo e($single_client_info->email); ?></h5>
            </div>
            <?php else: ?>
            <h4 class="card-title">Corporate Client Information</h4>
            <div class="alert alert-success" role="alert">
              <h5>Company Name: <?php echo e($single_client_info->name); ?></h5>
              <h5>Company Phone: <?php echo e($single_client_info->phone); ?></h5>
              <h5>Company Email: <?php echo e($single_client_info->email); ?></h5>
              <h5>Officer Name : <?php echo e($single_client_info->compliance_name); ?></h5>
              <h5>Officer Phone: <?php echo e($single_client_info->compliance_phone); ?></h5>
            </div>
            <?php endif; ?>  
            <h4 class="card-title">Product Rate</h4>
            <div class="alert alert-info" role="alert">
            <?php
            $single_clients_products=DB::table('tbl_product')
            ->where('client_id',$single_client_info->client_id)
            ->get();
            foreach($single_clients_products as $v_product_single){?>
                <h5><?php echo e($v_product_single->product_name); ?>=<?php echo e($v_product_single->product_rate); ?></h5>
            <?php } ?>
             </div>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Client Previous Order</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#SN</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Challan No</th>
                            <th>Bill No</th>
                            <th>Total</th>
                            <th>Advance</th>
                            <th style="color: red;">Due</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $single_clients_order=DB::table('tbl_order')
                        ->where('client_id',$single_client_info->client_id)
                        ->get();
                        $i=1;
                        foreach($single_clients_order as $v_order_single) {?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e(Carbon::parse($v_order_single->date)->format('d-m-Y')); ?></td>
                            <td><?php echo e($v_order_single->product_name); ?></td>
                            <td><?php echo e($v_order_single->chalan_number); ?></td>
                            <td><?php echo e($v_order_single->bill_number); ?></td>
                            <td><?php echo e($total=$v_order_single->total_amount); ?> TK</td>
                            <td><?php echo e($adv=$v_order_single->advance_amount); ?> TK</td>
                            <td style="color: red;"><?php echo e($due=$total-$adv); ?> TK</td>
                            <td>
                            	<a href="<?php echo e(URL::to('/order-edit-form/'.$v_order_single->order_id)); ?>"><button type="button" class="btn btn-outline-primary">Payment</button></a>
                            	<a href="<?php echo e(URL::to('/show-order-detail/'.$v_order_single->order_id)); ?>"><button type="button" class="btn btn-outline-success">View</button></a>
                            </td>
                        </tr>
                        <?php  $i++;} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#SN</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Challan No</th>
                            <th>Bill No</th>
                            <th>Total</th>
                            <th>Advance</th>
                            <th>Due</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
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