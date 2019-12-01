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
            <h4 class="page-title">Employee Leave Date</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employee Leave</li>
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
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" action="<?php echo e(URL::to('/add-leave')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Add Employee Leave</h4>
                      <?php
                    $message=Session::get('message');
                    
                    if($message)
                    {
                        echo $message;
                        Session::put('message',NULL);
                    }
                    ?>
                    <h3>Employee Name: <?php echo e($employee_detail->employee_name); ?></h3>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Leave Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="leave_date" class="form-control" id="fname" required="">
                        </div>
                    </div>
                    <input type="hidden" name="employee_id" value="<?php echo e($employee_detail->employee_id); ?>">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Leave Purpose</label>
                        <div class="col-sm-9">
                            <input type="text" name="leave_purpose" class="form-control" id="fname" required="">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Add Leave</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
    <div class="card">
        <h4>Employee Name:<?php echo e($employee_detail->employee_name); ?></h4>
        <h4>Leave This Month:<?php echo e($leave_number); ?></h4>
    </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Employee Leave Record for this Month</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#SN</th>
                             <th>Leave Date</th>
                            <th style="color: red;">Leave Purpose</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    
                    foreach($leave_detail as $v_all_leave) {?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($v_all_leave->leave_date); ?></td>
                            <td><?php echo e($v_all_leave->leave_purpose); ?></td>
                            <td>
                                <a href="<?php echo e(URL::to('')); ?>"><button type="button" class="btn btn-outline-primary">Update</button></a>
                                <a href="<?php echo e(URL::to('')); ?>"><button type="button" class="btn btn-outline-success">Delete</button></a>
                            </td>
                        </tr>
                        <?php  $i++;
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#SN</th>
                             <th>Leave Date</th>
                            <th style="color: red;">Leave Purpose</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
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