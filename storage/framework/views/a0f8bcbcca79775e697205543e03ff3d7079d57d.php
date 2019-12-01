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
            <h4 class="page-title">All Supplier List</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier list</li>
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
        <h5 class="card-title">Supplier List</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Supplier ID</th>
                        <th>Supplier Name</th>
                        <th>Supplier Phone</th>
                        <th>Officer Name</th>
                        <th>Officer Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php $__currentLoopData = $supplier_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_supplier_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($v_supplier_list->supplier_id); ?></td>
                        <td><?php echo e($v_supplier_list->supplier_name); ?></td>
                        <td><?php echo e($v_supplier_list->supplier_phone); ?></td>
                        <td><?php echo e($v_supplier_list->officer_name); ?></td>
                        <td><?php echo e($v_supplier_list->officer_phone); ?></td>
                        <td>
                        	<a href="<?php echo e(URL::to('/supply-order-form/'.$v_supplier_list->supplier_id)); ?>"><button type="button" class="btn btn-outline-primary">Order</button></a>
                        	<a href="<?php echo e(URL::to('/supplier-detail/'.$v_supplier_list->supplier_id)); ?>"><button type="button" class="btn btn-outline-warning">Info</button></a>
                        </td>
                    </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </tbody>
                <tfoot>
                    <tr>
                        <th>Supplier ID</th>
                        <th>Supplier Name</th>
                        <th>Supplier Phone</th>
                        <th>Officer Name</th>
                        <th>Officer Phone</th>
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