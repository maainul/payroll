<?php $__env->startSection('accountant_content'); ?>
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
            <h3 class="page-title">Employee Salary</h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/accountant')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employee</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php if(Session::has('message')): ?>
<div class="alert alert-success" role="alert">
   <h4><?php echo e(Session::get('message')); ?></h4>
</div>
<?php elseif(Session::has('error')): ?>
<div class="alert alert-warning" role="alert">
   <h4><?php echo e(Session::get('error')); ?></h4>
</div>
<?php endif; ?>
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
        <?php if($salary_check==1): ?>
        
            <center>
                <a href="<?php echo e(url('/show-employee-salary-pdf/'.$employee_salary->employee_id)); ?>" class="btn btn-success" target="blank">Print</a>
            </center>
        <?php endif; ?>
        <h4 style="text-align: center;"> Employee Name: <?php echo e($employee_salary->employee_name); ?></h4>
         <center><img src="<?php echo e(URL::to($employee_salary->employee_photo)); ?>"  height="80" width="100" ></center> 
            <h5 style="text-align: center;">
            Grade:<?php echo e($employee_salary->grade_name); ?>, Department:<?php echo e($employee_salary->department_name); ?><br>
            Designation:<?php echo e($employee_salary->designation_name); ?><br>
        </h5>
         <h5 style="text-align: center;">Salary Month:<?php echo e(Carbon::now()->format('F-Y')); ?></h5>
         <?php if($salary_check==0): ?>
         <h5 style="text-align: center;">Salary Status: Not Paid Yet</h5>
         <?php else: ?>
         <h5 style="text-align: center; color: red;">Salary Status: Already Paid</h5>
         <?php endif; ?>
    </div>
    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table  class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Attendance</th>
                            <th>Total Salary</th>
                            <th>Grade Detail</th>
                            <th>Extra Income</th>
                            <th>Sub Total</th>
                            <th>Fine</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
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
                                Basic Salary:<?php echo e($employee_salary->basic_salary); ?>TK<br>
                                Home Rent:<?php echo e($employee_salary->home_rent); ?>TK<br>
                                Festible Bonus:<?php echo e($ft=$employee_salary->festible_bonus); ?>TK<br>
                                ---Allowance---<br>
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
                                 <?php if($festible->festible=='yes' && $join_date>=12 ): ?>
                                Festible Bonus:<?php echo e($festible_bonus=$ft); ?>

                                <?php else: ?>
                                Festible Bonus:<?php echo e($festible_bonus=0); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($sub=($per_day_basic*$attend)+$attd_bonus+$ot_rate+$night_bonus+$leave_bon+$festible_bonus); ?> </td>
                            <td> <?php echo e($fine=$absent*($per_day_basic/2)); ?></td>
                            <td><?php echo e($total_paid_salary=$sub-$fine); ?> </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
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
<hr>
<?php $bonus=$attd_bonus+$ot_rate+$night_bonus+$leave_bon+$festible_bonus ?>
<form action="<?php echo e(url('/pay-salary')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="employee_id" value="<?php echo e($employee_salary->employee_id); ?>">
    <input type="hidden" name="unit_id" value="<?php echo e($employee_salary->unit_id); ?>">
    <input type="hidden" name="office_id" value="<?php echo e($employee_salary->office_id); ?>">
    <input type="hidden" name="grade_id" value="<?php echo e($employee_salary->grade_id); ?>">
    <input type="hidden" name="designation_id" value="<?php echo e($employee_salary->designation_id); ?>">
    <input type="hidden" name="department_id" value="<?php echo e($employee_salary->department_id); ?>">
    <input type="hidden" name="bonus" value="<?php echo e($bonus); ?>">
    <input type="hidden" name="fine" value="<?php echo e($fine); ?>">
    <input type="hidden" name="total_salary" value="<?php echo e($total_paid_salary); ?>">
    <?php if($salary_check==0): ?>
    <center><input class="btn btn-danger btn-lg" type="submit" name="submit" value="Pay Salary"></center>
    <?php endif; ?>
</form>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<script type="text/javascript">
    printme(){
        window.print();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>