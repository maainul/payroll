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
            <h4 class="page-title">Today  Attendance List</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Attendance</li>
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
            <h5 class="card-title">All Attendance Information </h5>
<?php if(Session::has('message')): ?>
   <div class="alert alert-success" role="alert">
       <?php echo e(Session::get('message')); ?>

   </div>
<?php elseif(Session::has('error')): ?>
   <div class="alert alert-warning" role="alert">
       <?php echo e(Session::get('error')); ?>

   </div>
<?php endif; ?>
 <h2 class="text-center" style="color: #2d5596"> Attendance List for: <?php echo e(Carbon::today()->format('l,F-d,Y')); ?></h2>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Ofice</th>
                            <th>Unit</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $daily_attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_daily_attnd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
							<td><?php echo e($v_daily_attnd->per_office); ?></td>
                            <td><?php echo e($v_daily_attnd->per_unit); ?></td>
                            <td><?php echo e($v_daily_attnd->per_shift); ?></td>
                            <td>
                            	<a href="<?php echo e(URL::to('/attendance-detail/'.$v_daily_attnd->per_unit.'/'.$v_daily_attnd->per_shift)); ?>"><button type="button" class="btn btn-outline-primary">Update</button></a>
                            	<a href="<?php echo e(URL::to('')); ?>"><button type="button" class="btn btn-outline-success">Salary</button></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                           <th>Unit</th>
                            <th>Ofice</th>
                            <th>Shift</th>
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