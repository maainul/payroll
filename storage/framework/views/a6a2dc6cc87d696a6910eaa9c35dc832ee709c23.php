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
            <h4 class="page-title"> Office Unit & Department</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Office</li>
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
            <form class="form-horizontal" action="<?php echo e(URL::to('/add-office')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Office Info</h4>
                      <?php
                    $message=Session::get('message');
                    
                    if($message)
                    {
                        echo $message;
                        Session::put('message',NULL);
                    }
                    ?>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Office Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="office_name" class="form-control" id="fname" placeholder="Enter Office Name Here" required="">
                        </div>
                    </div>
                </div>
                <br>

                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Add Office</button>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
    <div class="card">
        <form class="form-horizontal" action="<?php echo e(URL::to('/add-unit')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="card-body">
                <h4 class="card-title">Unit Info</h4>
                  <?php
                $message=Session::get('message');
                
                if($message)
                {
                    echo $message;
                    Session::put('message',NULL);
                }
                ?>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Unit Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="unit_name" class="form-control" id="fname" placeholder="Enter Unit Name Here" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Office</label>
                    <div class="col-sm-9">
                        <select name="office_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <?php
                        $all_office=DB::table('tbl_office')
                        ->get();
                        ?>
                            <?php $__currentLoopData = $all_office; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_show_office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v_show_office->office_id); ?>"><?php echo e($v_show_office->office_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Add Unit</button>
                </div>
            </div>
        </form>
    </div>
    </div>
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
                            <td><?php echo e($adv=$v_show_unit->office_name); ?></td>
                            <td><?php echo e($adv=$v_show_unit->unit_name); ?></td>
                            <td>
                                <a href="<?php echo e(URL::to('show-update-office/'.$v_show_unit->unit_id)); ?>"><button type="button" class="btn btn-outline-primary">Update</button></a>
                               <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" ><button type="button" class="btn btn-outline-primary">Delete</button></a>
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

<!-- Modal Add Category -->
<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Sure to Delete</strong>This Unit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-footer">
               <a href="<?php echo e(url('/delete-unit/'.$v_show_unit->unit_id)); ?>"> <button type="button" class="btn btn-danger waves-effect waves-light save-category">Delete</button></a>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('hrm_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>