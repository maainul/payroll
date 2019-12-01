<?php $__env->startSection('admin_content'); ?>
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
            <h4 class="page-title">Team Member Manage Pannel</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Team Member</li>
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
    <div class="col-md-8">
        <div class="card">
           <p class="alert-success">
            <?php
            $message=Session::get('message');
            
            if($message)
            {
                echo $message;
                Session::put('message',NULL);
            }
            ?>
            </p>
        </div>
    </div>
    <div class="col-md-4">
       
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Manage Previous Slide</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#SN</th>
                            <th>Team Name</th>
                            <th>Team Designation</th>
                            <th>Team Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach($show_team_member as $v_team) {?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($v_team->team_name); ?></td>
                            <td><?php echo e($v_team->team_designation); ?></td>
                            <td><img src="<?php echo e(URL::to($v_team->team_photo)); ?>" style="height:100px;width:100px;"></td>
                            <td>
                                <a href="<?php echo e(URL::to('/update-team-form/'.$v_team->aboutteam_id)); ?>"><button type="button" class="btn btn-outline-primary">Update</button></a>
                            </td>
                        </tr>
                        <?php  $i++;} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                             <th>#SN</th>
                            <th>Team Name</th>
                            <th>Team Designation</th>
                            <th>Team Image</th>
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