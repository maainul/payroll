<?php $__env->startSection('data_content'); ?>
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
            <h4 class="page-title">Update Addendance</h4>
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
            <h5 class="card-title"> Employee List For Update Attendance</h5>
             <h2 class="text-center" style="color: #2d5596"> Attendance Update for: <?php echo e(Carbon::today()->format('l,F-d,Y')); ?></h2>
            <div class="table-responsive">
                 <form action="<?php echo e(url('/update-attendance')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#SN</th>
							 <th>Employee Name</th>
                            <th>Designation </th>
                            <th> Status</th>
                            <th> In Time</th>
                            <th> Out Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach($daily_attendance_details as $v_attend_detail) {?>
                        <tr>
                            <td><?php echo e($i); ?></td>
							<td><?php echo e($v_attend_detail->employee_name); ?></td>
                            <td><?php echo e($v_attend_detail->designation_name); ?>

                                <input type="hidden" name="id[]" value="<?php echo e($v_attend_detail->id); ?>">
                            </td>
                            <td>
                            	<select name="attendance[<?php echo e($v_attend_detail->id); ?>]" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                    <?php if($v_attend_detail->attendance_status=='present'): ?>
                                    <option value="<?php echo e($v_attend_detail->attendance_status); ?>">Present</option>
                                     <option value="absent">Absent</option>
                                    <?php else: ?>
                                    <option value="<?php echo e($v_attend_detail->attendance_status); ?>">Absent</option>
                                    <option value="present">Present</option>
                                   <?php endif; ?>
                                </select>
                            </td>
                             <td><input type="Time" name="att_in[<?php echo e($v_attend_detail->id); ?>]" value="<?php echo e($v_attend_detail->in_time); ?>"></td>
                           <td><input type="Time" name="att_out[<?php echo e($v_attend_detail->id); ?>]" value="<?php echo e($v_attend_detail->out_time); ?>"></td>
                        </tr>
                        <?php  $i++;
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#SN</th>
                             <th>Employee Name</th>
                            <th>Designation </th>
                            <th> Status</th>
                            <th> In Time</th>
                            <th> Out Time</th>
                        </tr>
                    </tfoot>
                </table>
                 <button type="submit" name="submit" class="btn btn-primary">Update Attendance</button>
            </form>
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
<script >
    document.getElementById("myTime").value = "hh:mm:ms";
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('data_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>