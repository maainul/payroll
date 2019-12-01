<?php $__env->startSection('accountant_content'); ?>
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
            <h4 class="page-title">AGenerate Salary Record</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Salary Record</li>
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
            <form class="form-horizontal" action="<?php echo e(URL::to('/search-salary-record')); ?>" method="post" enctype="multipart/form-data">
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
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Month</label>
                    <div class="col-sm-9">
                        <select name="salary_month" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <option value="">Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>

                        </select>
                    </div>
                    </div>
                     <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Grade</label>
                    <div class="col-sm-9">
                        <select name="salary_year" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <option value="">Select Year</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2019">2020</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Office</label>
                    <div class="col-sm-9">
                        <select name="unit_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <option value="">Select Office</option>
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
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Show Salary</button>
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
<?php echo $__env->make('accountant_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>