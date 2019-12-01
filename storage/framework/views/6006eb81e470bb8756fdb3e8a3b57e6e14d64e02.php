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
            <h4 class="page-title"> Add login for Role</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Role Employee</li>
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
            <form class="form-horizontal" action="<?php echo e(URL::to('/add-roller')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Office Info</h4>
                    <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert">
                   <?php echo e(Session::get('message')); ?>

               </div>
                <?php elseif(Session::has('error')): ?>
               <div class="alert alert-warning" role="alert">
                   <?php echo e(Session::get('error')); ?>

               </div>
                 <?php endif; ?>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Roller Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="admin_name" class="form-control" id="fname" placeholder="Roller Name Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Roller Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="admin_email" class="form-control" id="fname" placeholder="abdulkarim@gmail.com" required="">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Roller Phone(+88)</label>
                        <div class="col-sm-9">
                            <input type="text" name="admin_phone" class="form-control" id="fname" placeholder="00000000000" required="" maxlength="11" minlength="11">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Roller User Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="admin_user" class="form-control" id="fname" placeholder="Roller User Name Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Roller Password</label>
                        <div class="col-sm-9">
                            <input type="Password" name="admin_password" class="form-control" id="fname" placeholder="Roller Password Here" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Role Type</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="admin_type" required="">
                                <option value="">Select Tole Type</option>
                                <option value="hr-manager">HR Manager</option>
                                <option value="manager">Manager</option>
                                <option value="accountant">Accountant</option>
                                <option value="data-entry">Data Entry Operator</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>

                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Role Employee</button>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Role Employee</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                           <th>#Sl</th>
                            <th>Role Name</th>
                            <th>Role Phone</th>
                            <th>Role type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $all_role=DB::table('tbl_admin')
                                ->whereIn('admin_type',['hr-manager','manager','accountant'])
                                ->get();
                        $i=1;
                        foreach($all_role as $v_role) {?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($v_role->admin_name); ?></td>
                            <td><?php echo e($v_role->admin_phone); ?></td>
                            <td><?php echo e($v_role->admin_type); ?></td>
                            <td>
                                <a href="<?php echo e(URL::to('/show-update-roller/'.$v_role->admin_id)); ?>"><button type="button" class="btn btn-outline-primary">Update</button></a>
                               <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" ><button type="button" class="btn btn-outline-primary">Delete</button></a>
                            </td>
                        </tr>
                        <?php  $i++;} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#Sl</th>
                            <th>Role Name</th>
                            <th>Role Phone</th>
                            <th>Role type</th>
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
                <h4 class="modal-title"><strong>Sure to Delete</strong>This Roller</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-footer">
               <a href="<?php echo e(url('/delete-roller/'.$v_role->admin_id)); ?>"> <button type="button" class="btn btn-danger waves-effect waves-light save-category">Delete</button></a>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>