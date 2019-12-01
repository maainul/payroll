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
            <h4 class="page-title"> Daily Cost List</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daily Cost</li>
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
            <h5 class="card-title">Daily Cost List</h5>
            <?php 
                    $daily_cost=DB::table('tbl_cost')
                           ->where('date', date('Y-m-d'))
                            ->sum('tbl_cost.cost_amount');
            ?>
            <h5 class="card-title">Daily Cost: <?php echo e(($daily_cost)); ?> TK</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#SN</th>
                            <th>Date</th>
                            <th>Cost Purpose</th>
                            <th style="color: red;">Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    
                    foreach($daily_cost_list as $v_daily_cost_list) {?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e(Carbon::parse($v_daily_cost_list->date)->format('d-m-Y')); ?></td>
                             <?php if($v_daily_cost_list->cost_purpose==1): ?>
                            <td>Office Rent</td>
                            <?php elseif($v_daily_cost_list->cost_purpose==2): ?>
                            <td>Current Bill</td>
                            <?php elseif($v_daily_cost_list->cost_purpose==3): ?>
                            <td>Internet Bill</td>
                            <?php elseif($v_daily_cost_list->cost_purpose==4): ?>
                            <td>Water Bill</td>
                            <?php elseif($v_daily_cost_list->cost_purpose==5): ?>
                            <td>Paper Bill</td>
                             <?php elseif($v_daily_cost_list->cost_purpose==6): ?>
                            <td>Tiffin Bill</td>
                            <?php elseif($v_daily_cost_list->cost_purpose==7): ?>
                            <td>Transport Bill</td>
                             <?php elseif($v_daily_cost_list->cost_purpose==8): ?>
                            <td>Media Bill</td>
                             <?php elseif($v_daily_cost_list->cost_purpose==9): ?>
                            <td>Other Bill</td>
                            <?php endif; ?>
                            <td><?php echo e($v_daily_cost_list->cost_amount); ?> TK</td>
                            <td>
                            	<a href="<?php echo e(URL::to('/cost-edit-form/'.$v_daily_cost_list->cost_id)); ?>"><button type="button" class="btn btn-outline-primary">Update</button></a>
                            </td>
                        </tr>
                        <?php  $i++;
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                           <th>#SN</th>
                            <th>Date</th>
                            <th>Cost Purpose</th>
                            <th style="color: red;">Amount</th>
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