<?php $__env->startSection('hrm_content'); ?>
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
            <h4 class="page-title">Add New Employee</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
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
            <form class="form-horizontal" action="<?php echo e(URL::to('/add-employee')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Employee Info</h4>
                      <?php
                    $message=Session::get('message');
                    
                    if($message)
                    {
                        echo $message;
                        Session::put('message',NULL);
                    }
                    ?>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="employee_name" class="form-control" id="fname" placeholder="Enter Employee Name Here" required="">
                        </div>
                    </div>
                     <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Unit</label>
                    <div class="col-sm-9">
                        <select name="unit_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <?php 
                            $all_unit=DB::table('tbl_unit')
                                            ->join('tbl_office','tbl_unit.office_id','=','tbl_office.office_id')
                                            ->get();
                            ?>
                            <?php $__currentLoopData = $all_unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_all_unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v_all_unit->unit_id); ?>"><?php echo e($v_all_unit->office_name); ?>-<?php echo e($v_all_unit->unit_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Designation</label>
                    <div class="col-sm-9">
                        <select name="designation_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <?php 
                            $all_designation=DB::table('tbl_designation')
                                            ->join('tbl_department','tbl_designation.department_id','=','tbl_department.department_id')
                                            ->get();
                            ?>
                            <?php $__currentLoopData = $all_designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_all_designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v_all_designation->designation_id); ?>"><?php echo e($v_all_designation->department_name); ?>-<?php echo e($v_all_designation->designation_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    </div>
                     <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Grade</label>
                    <div class="col-sm-9">
                        <select name="grade_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <?php 
                            $all_grade=DB::table('tbl_grade')
                                            ->get();
                            ?>
                            <?php $__currentLoopData = $all_grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_all_grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v_all_grade->grade_id); ?>"><?php echo e($v_all_grade->grade_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Shift</label>
                    <div class="col-sm-9">
                        <select name="shift_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <option value="day">Day Shift</option>
                            <option value="night">Night Shift</option>
                        </select>
                    </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-3">Employee Image</label>
                        <div class="col-md-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="employee_photo" id="validatedCustomFile" >
                                <label class="custom-file-label" for="validatedCustomFile">Select Image...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Emoloyee Phone Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="employee_phone" class="form-control" maxlength="11" minlength="11" id="fname" placeholder="Enter Emoloyee Phone Number Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="employee_email" class="form-control" id="fname" placeholder="Enter Employee Email Here" >
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee Join Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="employee_join_date" class="form-control" id="fname" placeholder="Enter Employee Join Date Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee National ID</label>
                        <div class="col-sm-9">
                            <input type="text" name="employee_nid" class="form-control" id="fname" placeholder="Enter Employee National ID Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee Father Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="employee_father_name" class="form-control" id="fname" placeholder="Enter Employee Father NameHere" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee Mother Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="employee_mother_name" class="form-control" id="fname" placeholder="Enter Employee Mother Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" name="employee_date_of_birth" class="form-control" id="fname" placeholder="Enter Date of Birth Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee Parmanent Address</label>
                        <div class="col-sm-9">
                            <textarea name="employee_parmanent_address"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee Present Address</label>
                        <div class="col-sm-9">
                            <textarea name="employee_present_address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </div>
                </div>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('hrm_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>