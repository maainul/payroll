<?php $__env->startSection('admin_content'); ?>
<?php
use Carbon\Carbon;
?>
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
            <h4 class="page-title"> All Unit List for Salary</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Unit</li>
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
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Unit List</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#SN</th>
                            <th>Office Name</th>
                            <th>Unit Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach($all_unit as $v_show_unit) {?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($v_show_unit->office_name); ?></td>
                            <td><?php echo e($v_show_unit->unit_name); ?></td>
                            <td>
                                <a href="<?php echo e(URL::to('/unit-employee-list/'.$v_show_unit->unit_id)); ?>"><button type="button" class="btn btn-outline-primary">Employee List</button></a>
                                <a href="<?php echo e(URL::to('/generate-salary/'.$v_show_unit->unit_id)); ?>"><button type="button" class="btn btn-outline-primary">Generate Salary </button></a>
                            </td>
                        </tr>
                        <?php  $i++;} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#Sl</th>
                            <th>Unit Name</th>
                            <th>Office Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

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