<?php $__env->startSection('admin_content'); ?>
<?php use Carbon\Carbon;?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

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
            <h4 class="page-title"> All Unit Employee Salary List </h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Unit Salary</li>
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
        <h5 class="card-title">All Salary List For Unit:</h5>
        <h5 class="card-title">All Salary List For Office:</h5>
        <?php $__currentLoopData = $employee_salary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="container">
            <h3 style="text-align: center;">BEXIMCO Industrial Park</h3>
            <h4 style="text-align: center;">Office:<?php echo e($office->office_name); ?></h4>
            <h4 style="text-align: center;">Unit:<?php echo e($office->unit_name); ?></h4>
            <h3 style="text-align: center;">Salary Month:<?php echo e(Carbon::now()->format('F-Y')); ?></h3>
        <div class="row">
              <div class="col-md-8">
                <h5>Employee Name:<?php echo e($v_employee->employee_name); ?></h5>
                <h5>Department:<?php echo e($v_employee->department_name); ?></h5>
                <h5>Designation:<?php echo e($v_employee->designation_name); ?></h5>
              </div> 
            <div class="col-md-4">
                 <img src="<?php echo e(URL::to($v_employee->employee_photo)); ?>"  height="80" width="100" class="center">
                
            </div>
        </div>
         <h4 style="text-align: center;">Salary Detail</h4>
            <table style="width:100%">
                <thead>
                    <tr>
                        <th>Basic Salary</th>
                        <th>Attendance</th>
                        <th>Others</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                
                    <tr>
                        <td>
                            Basic:<?php echo e($total_basic=$v_employee->total_salary); ?>TK CD:<?php echo e($dayofmonth=Carbon::now()->daysInMonth); ?>

                        </td>
                        <td>
                        <?php $employee_att=DB::table('tbl_attendance')
                        ->where('employee_id',$v_employee->employee_id)
                        ->whereMonth('attendance_date',Carbon::now()->month)
                        ->where('attendance_status','present')
                        ->get(); ?>
                        Present:<?php echo e($attend=$employee_att->count('id')); ?>day
                        </td>
                        <td>
                         <?php if($attend=='22'): ?>
                        Attend Bonus:<?php echo e($attd_bonus=1000); ?> TK<br>
                        <?php else: ?>
                        Attend Bonus:<?php echo e($attd_bonus=0); ?>TK<br>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Per day:<?php echo e($per_day_basic=intval($total_basic/$dayofmonth)); ?> 
                        </td>
                        <td>
                           <?php $employee_abs=DB::table('tbl_attendance')
                        ->where('employee_id',$v_employee->employee_id)
                        ->whereMonth('attendance_date',Carbon::now()->month)
                        ->where('attendance_status','absent')
                        ->count(); ?>
                        Absent:<?php echo e($absent=$employee_abs); ?>day
                        </td>
                        <td>
                           <?php $numberOfHours = DB::table('tbl_attendance')
                                        ->where('employee_id', $v_employee->employee_id)
                                        ->where('attendance_status', 'present')
                                        ->whereMonth('attendance_date',Carbon::now()->month)
                                        ->whereNotNull('in_time')
                                        ->whereNotNull('out_time')
                                        ->select(DB::raw('SUM(time_to_sec(timediff(out_time, in_time)) / 3600) as result '))
                                        ->get(); ?>
                             <?php $__currentLoopData = $numberOfHours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                TotalHour:<?php echo e($total=intval($w->result)); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                             Basic Salary:<?php echo e($v_employee->basic_salary); ?> 
                        </td>
                        <td>
                            <?php $leave_number=DB::table('tbl_leave')
                                ->whereMonth('leave_date',Carbon::now()->month)
                                ->where('employee_id',$v_employee->employee_id)
                                ->count('employee_id'); ?>
                             Leave:<?php echo e($leave_number); ?>

                        </td>
                        <td>
                             Overtime: <?php echo e($overtime=$total-($attend*9)); ?>Hour
                        </td>
                       
                    </tr>
                    <tr>
                        <td>
                            Home Rent:<?php echo e($v_employee->home_rent); ?>TK
                        </td>
                        <td>
                            <?php $shift_night=DB::table('tbl_attendance')
                                    ->where('employee_id',$v_employee->employee_id)
                                    ->whereMonth('attendance_date',Carbon::now()->month)
                                    ->where('shift_id','night')
                                    ->count();?>
                            Night Shift: <?php echo e($shift_night); ?> Day
                        </td>
                         <td>
                             OT Rate:  <?php echo e($p_ot=$v_employee->ot_rate); ?>*<?php echo e($overtime); ?> =<?php echo e($ot_rate=$p_ot*$overtime); ?> TK
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Medical:<?php echo e($v_employee->medical_allowance); ?>TK
                        </td>
                        <td></td>
                        <td>
                             Night Allowance:<?php echo e($night_bonus=$shift_night*100); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                           Transport:<?php echo e($v_employee->transport_allowance); ?>TK
                        </td>
                        <td></td>
                        <td>
                            <?php  $leave_number=DB::table('tbl_leave')
                                        ->whereMonth('leave_date',Carbon::now()->month)
                                        ->where('employee_id',$v_employee->employee_id)
                                        ->count('employee_id'); ?>
                            Leave Allowance:<?php echo e($height_leave=$v_employee->holiday-$leave_number); ?> * <?php echo e($leave_bonus=$v_employee->holiday_bonus); ?> =        
                            <?php if($leave_number > $height_leave): ?>
                            <?php echo e($leave_bon=0); ?><br>
                            <?php else: ?>
                            <?php echo e($leave_bon=($height_leave-$leave_number)*$leave_bonus); ?><br>
                            <?php endif; ?>
                        </td>
                    </tr>
                     <tr>
                        <td>
                           Lunch:<?php echo e($v_employee->lunch_allowance); ?>TK
                        </td>
                        <td></td>
                        <td>Fine: <?php echo e($fine=$absent*($per_day_basic/2)); ?></td>
                    </tr>
                    <tr>
                        <td>
                           Overtime Rate:<?php echo e($p_ot=$v_employee->ot_rate); ?>

                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            Max Leave:<?php echo e($height_leave=$v_employee->holiday); ?>day
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            Leave Bonus:<?php echo e($leave_bonus=$v_employee->holiday_bonus); ?>tk
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total: 8000TK</th>
                        <th></th>
                        <th><?php echo e($other=($attd_bonus+$ot_rate+$night_bonus+$leave_bon)-$fine); ?>TK</th>
                        <th><?php echo e(($per_day_basic*$attend)+$other); ?></th>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col-md-4">
                    <br><br><br>

                  <center>--------------------------</center>
                    <center>Employee Signiture</center> <br>
                </div>
                <div class="col-md-4">
                     <br><br><br>
                    <center>--------------------------</center>
                    <center>Accounce</center> <br>
                </div>
                 <div class="col-md-4">
                     <br><br><br>
                    <center>--------------------------</center>
                    <center>Manager</center> <br>
                </div>
            </div>
        </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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