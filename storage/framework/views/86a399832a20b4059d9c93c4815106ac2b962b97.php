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
            <h4 class="page-title"> Monthly Costing Chart</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Monthly Chart</li>
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
            <h3 class="card-title">Monthly Order Record Status</h3>
            <h4 class="text-center">Data Shows Between:<?php echo e(Carbon::today()->subDays(30)->format('d-m-Y')); ?> to <?php echo e($date=date("d-m-Y")); ?></h4>
            <br>
            <?php 
                $daily_order=DB::table('tbl_order')
                            ->whereDate('date', '>=', Carbon::now()->subDays(30))
                            ->get();
            ?>
            <h4>Monthly Number Of Order: <?php echo e(count( $daily_order)); ?> </h4>
            <br>
                <!-- Cards -->
                <div class="row">
                    <div class="col-md-6">
                        <?php 
                            $monthly_total=DB::table('tbl_order')
                            ->whereDate('date', '>=', Carbon::now()->subDays(30))
                            ->sum('tbl_order.total_amount');
                         ?>
                        <div class="card m-t-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Total Amount of Monthly Order</h6>
                                    <div class="peity_bar_neutral left text-center m-t-10"><span><span style="display: none;">10,15,8,14,13,10,8</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h3>Last Month Total </h3>
                                        <h3 class="mb-0 font-weight-bold"><?php echo e($total= $monthly_total); ?> TK</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 border-left text-center p-t-10">
                                <?php 
                                    $monthly_advance=DB::table('tbl_order')
                                    ->whereDate('date', '>=', Carbon::now()->subDays(30))
                                    ->sum('tbl_order.advance_amount');
                                ?>
                                <h6>Advance Amount of Monthly Order</h6>
                                 <div class="peity_bar_good text-center m-t-10"><span><span style="display: none;">7,16,4,21,8,15,8</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h3>Last Month Advance </h3>
                                        <h3 class="mb-0 font-weight-bold"><?php echo e($advance= $monthly_advance); ?> TK</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-t-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Monthly Amount of Due Order</h6>
                                    <div class="peity_bar_bad left text-center m-t-10"><span><span style="display: none;">3,5,6,16,8,10,6</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h3>Last Month Due </h3>
                                        <h3 class="mb-0 font-weight-bold"><?php echo e($due=$total-$advance); ?> TK</h3></div>
                                </div>
                                <div class="col-md-6 border-left text-center p-t-10">
                                    <?php 
                                    $daily_discount=DB::table('tbl_order')
                                    ->whereDate('date', '>=', Carbon::now()->subDays(30))
                                    ->sum('tbl_order.discount');
                                    ?>
                                     <h6>Monthly Amount of Discount </h6>
                                     <div class="peity_bar_good text-center m-t-10"><span><span style="display: none;">20,18,14,12,13,10,10</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h3>Last Month Discount </h3>
                                        <h3 class="mb-0 font-weight-bold"><?php echo e($daily_discount); ?> TK</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <?php 
                            $monthly_number_cost=DB::table('tbl_cost')
                                        ->whereDate('date', '>=', Carbon::now()->subDays(30))
                                        ->get();
                        ?>
                        <h4>Monthly Number of Cost:<?php echo e(count($monthly_number_cost)); ?></h4>
                        <div class="card m-t-0">
                                <div class="col-md-6 border-left text-center p-t-10">
                                     <h6> Amount of Cost Last Month</h6>
                                    <h3 class="mb-0 font-weight-bold"><?php echo e($monthly_cost_chart); ?> TK</h3>
                                    <h3>Cost Last Month</h3>
                                    <span class="text-muted">Monthly Cost</span>
                                </div>
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