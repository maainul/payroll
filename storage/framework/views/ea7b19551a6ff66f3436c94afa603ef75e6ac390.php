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
            <h4 class="page-title">All Client Order List</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Order list</li>
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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Client Order List</h5>
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
                    $i=1;
                    
                    foreach($all_order_list as $v_all_order_list) {?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($v_all_order_list->date); ?></td>
                            <td><?php echo e($v_all_order_list->product_name); ?></td>
                            <td><?php echo e($v_all_order_list->chalan_number); ?></td>
                            <td><?php echo e($v_all_order_list->bill_number); ?></td>
                            <td><?php echo e($total=$v_all_order_list->total_amount); ?></td>
                            <td><?php echo e($adv=$v_all_order_list->advance_amount); ?></td>
                            <td style="color: red;"><?php echo e($due=$total-$adv); ?></td>
                            <td>
                            	<a href="<?php echo e(URL::to('/order-edit-form/'.$v_all_order_list->order_id)); ?>"><button type="button" class="btn btn-outline-primary">Payment</button></a>
                            	<a href="<?php echo e(URL::to('/show-order-detail/'.$v_all_order_list->order_id)); ?>"><button type="button" class="btn btn-outline-success">View</button></a>
                            </td>
                        </tr>
                        <?php  $i++;
                    } ?>
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