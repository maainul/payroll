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
            <h4 class="page-title">All  Employee List</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Employee</li>
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
            <h5 class="card-title"> Employee Information </h5>
            <div class="table-responsive">
                <table  class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Employee Info</th>
                            <th>Attendance</th>
                            <th>Total Salary</th>
                            <th>Grade Detail</th>
                            <th>Extra Income</th>
                            <th>Sub Total</th>
                            <th>Fine</th>
                            <th> Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td>
                                Name:<?php echo e($employee_salary->employee_name); ?><br>
                                Grade:<?php echo e($employee_salary->grade_name); ?><br>
                                Department:<?php echo e($employee_salary->department_name); ?><br>
                                Designation:<?php echo e($employee_salary->designation_name); ?><br>
                            </td>
                            <td>
                                Present:<?php echo e($attend=$employee_att->count('id')); ?>day<br>
                                Leave:<?php echo e($leave_number); ?><br>
                                Absent:<?php echo e($absent=$employee_abs); ?>day<br>
                                Calander Day:<?php echo e($dayofmonth=Carbon::now()->daysInMonth); ?> day
                            </td>
                            <td>
                                Basic:<?php echo e($total_basic=$employee_salary->total_salary); ?>TK<br>
                                Per day:<?php echo e($per_day_basic=intval($total_basic/$dayofmonth)); ?>

                            </td>
                            <td> 
                                Basic Salary:<?php echo e($employee_salary->basic_salary); ?><br>
                                Home Rent:<?php echo e($employee_salary->home_rent); ?>TK<br>
                                ---Allowance---
                                Medical:<?php echo e($employee_salary->medical_allowance); ?>TK<br>
                                Transport:<?php echo e($employee_salary->transport_allowance); ?>TK<br>
                                Lunch:<?php echo e($employee_salary->lunch_allowance); ?>TK<br>
                                Overtime Rate:<?php echo e($p_ot=$employee_salary->ot_rate); ?>per hour<br>
                                Max Leave:<?php echo e($height_leave=$employee_salary->holiday); ?>day<br>
                                Leave Bonus:<?php echo e($leave_bonus=$employee_salary->holiday_bonus); ?>tk
                            </td>
                            <td> 
                                <?php if($attend=='22'): ?>
                                Attend Bonus:<?php echo e($attd_bonus=1000); ?> TK<br>
                                <?php else: ?>
                                 Attend Bonus:<?php echo e($attd_bonus=0); ?>TK<br>
                                 <?php endif; ?>
                                 <?php $__currentLoopData = $numberOfHours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    TotalHour:<?php echo e($total=intval($w->result)); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                Overtime: <?php echo e($overtime=($attend*9)-$total); ?>Hour<br>
                                OT Rate: <?php echo e($ot_rate=$p_ot*$overtime); ?> TK<br>
                                Night:<?php echo e($shift_night); ?> Day<br>
                                Night Allowance:<?php echo e($night_bonus=$shift_night*100); ?><br>
                                <?php if($leave_number > $height_leave): ?>
                                Leave Allowance:<?php echo e($leave_bon=0); ?><br>
                                <?php else: ?>
                                Leave Allowance:<?php echo e($leave_bon=($height_leave-$leave_number)*$leave_bonus); ?><br>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($sub=$total_basic+$attd_bonus+$ot_rate+$night_bonus+$leave_bon); ?> </td>
                            <td> <?php echo e($fine=$absent*($per_day_basic/2)); ?></td>
                            <td><?php echo e($sub-$fine); ?> </td>
                        </tr>
                         
                   
                    </tbody>
                    <tfoot>
                        <tr>
                             <th>Employee Info</th>
                            <th>Attendance</th>
                            <th>Total Salary</th>
                            <th>Grade Detail</th>
                            <th>Extra Income</th>
                            <th>SubTotal</th>
                            <th>Fine</th>
                            <th> Total</th>
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