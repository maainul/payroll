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
            <h4 class="page-title">Update Client Order Record</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Order </li>
                    </ol>
                </nav>
            </div>
        </div>
         <a href="<?php echo e(url('/order-form/'.$client_order_info->client_id)); ?>"><i class=" fas fa-angle-double-left">Back to Client Order</i></a>
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
            <form class="form-horizontal" action="<?php echo e(url('/update-client-order/'.$client_order_info->order_id)); ?>" method="post">
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
                    <h4>Total Amount:<?php echo e($client_order_info->total_amount); ?></h4>
                     <h4>Previous Advance Amount <u><?php echo e($client_order_info->advance_amount); ?></u>. Add with previous payment. Like<u>(<?php echo e($client_order_info->advance_amount); ?></u>+xxx=xxx)</h4>
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
                    <h4>Add for Discount, if any@</h4>
                     <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Discount</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="discount" placeholder="Enter Discount" >
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">TK</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <select class="select2 form-control " name="status" required="">
                        <option>Select Payment Type</option>
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
             <div class="card-body">
                <h5 class="card-title m-b-0">Order Detail Information</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Date</td>
                        <td><?php echo e($client_order_info->date); ?></td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td><?php echo e($client_order_info->product_name); ?></td>
                    </tr>
                    <tr>
                        <td>Challan Number</td>
                        <td><?php echo e($client_order_info->chalan_number); ?></td>
                    </tr>
                    <tr>
                        <td>Bill Number</td>
                        <td><?php echo e($client_order_info->bill_number); ?></td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td><?php echo e($client_order_info->total_amount); ?></td>
                    </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-body">
            <?php if($client_order_info->type==1): ?>
            <h3 class="card-title">Local Client Information</h3>
            <div class="alert alert-success" role="alert">
              <h5>Name: <?php echo e($client_order_info->name); ?></h5>
              <h5>Phone: <?php echo e($client_order_info->phone); ?></h5>
              <h5>Email: <?php echo e($client_order_info->email); ?></h5>
            </div>
            <?php else: ?>
            <h4 class="card-title">Corporate Client Information</h4>
            <div class="alert alert-success" role="alert">
              <h5>Company Name: <?php echo e($client_order_info->name); ?></h5>
              <h5>Company Phone: <?php echo e($client_order_info->phone); ?></h5>
              <h5>Company Email: <?php echo e($client_order_info->email); ?></h5>
              <h5>Officer Name : <?php echo e($client_order_info->compliance_name); ?></h5>
              <h5>Officer Phone: <?php echo e($client_order_info->compliance_phone); ?></h5>
            </div>
            <?php endif; ?>  
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