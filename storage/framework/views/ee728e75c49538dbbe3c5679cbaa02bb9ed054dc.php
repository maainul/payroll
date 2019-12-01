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
            <h4 class="page-title">All  User List</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All User</li>
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
            <h5 class="card-title">All System USsrList</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#SN</th>
							 <th>user Name</th>
                            <th style="color: red;">user Email</th>
                            <th style="color: red;">user Phone</th>
                            <th style="color: red;">user Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    
                    foreach($all_roller_list as $v_all_designation) {?>
                        <tr>
                            <td><?php echo e($i); ?></td>
							<td><?php echo e($v_all_designation->admin_name); ?></td>
                            <td><?php echo e($v_all_designation->admin_email); ?></td>
                            <td><?php echo e($v_all_designation->admin_phone); ?></td>
                            <td><?php echo e($v_all_designation->admin_type); ?></td>
                            <td>
                            	<a href="<?php echo e(URL::to('/show-update-roller/'.$v_all_designation->admin_id)); ?>"><button type="button" class="btn btn-outline-primary">Update</button></a>
                            	<a href="<?php echo e(URL::to('/delete-roller/'.$v_all_designation->admin_id)); ?>"><button type="button" class="btn btn-outline-success">Delete</button></a>
                            </td>
                        </tr>
                        <?php  $i++;
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#SN</th>
                             <th>Designation Name</th>
                            <th style="color: red;">Department Name</th>
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