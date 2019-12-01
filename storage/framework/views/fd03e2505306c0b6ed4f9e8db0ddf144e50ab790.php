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
            <h4 class="page-title"> Yearly Costing Chart</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Yearly Chart</li>
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
            <h3 class="card-title">Yearly Order Record Status</h3>
            <h4 class="text-center">Data Shows Between:<?php echo e(Carbon::today()->subDays(365)->format('d-m-Y')); ?> to <?php echo e($date=date("d-m-Y")); ?>  </h4>
            <br>
            <?php 
                $yearly_order=DB::table('tbl_order')
                            ->whereDate('date', '>=', Carbon::now()->subDays(365))
                            ->get();
            ?>
            <h4>Yearly Number Of Order: <?php echo e(count( $yearly_order)); ?> </h4>
            <br>
                <!-- Cards -->
                <div class="row">
                    <div class="col-md-6">
                        <?php 
                            $yearly_total=DB::table('tbl_order')
                            ->whereDate('date', '>=', Carbon::now()->subDays(365))
                            ->sum('tbl_order.total_amount');
                         ?>
                        <div class="card m-t-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Total Amount of Yearly Order</h6>
                                    <div class="peity_bar_neutral left text-center m-t-10"><span><span style="display: none;">10,15,8,14,13,10,8</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h3>Last Year Total </h3>
                                        <h3 class="mb-0 font-weight-bold"><?php echo e($total= $yearly_total); ?> TK</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 border-left text-center p-t-10">
                                <?php 
                                    $yearly_advance=DB::table('tbl_order')
                                    ->whereDate('date', '>=', Carbon::now()->subDays(365))
                                    ->sum('tbl_order.advance_amount');
                                ?>
                                <h6>Advance Amount of Yearly Order</h6>
                                 <div class="peity_bar_good text-center m-t-10"><span><span style="display: none;">7,16,4,21,8,15,8</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h3>Last Year Advance </h3>
                                        <h3 class="mb-0 font-weight-bold"><?php echo e($advance= $yearly_advance); ?> TK</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-t-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Yearly Amount of Due Order</h6>
                                    <div class="peity_bar_bad left text-center m-t-10"><span><span style="display: none;">3,5,6,16,8,10,6</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h3>Last Year Due </h3>
                                        <h3 class="mb-0 font-weight-bold"><?php echo e($due=$total-$advance); ?> TK</h3></div>
                                </div>
                                <div class="col-md-6 border-left text-center p-t-10">
                                    <?php 
                                    $yearly_discount=DB::table('tbl_order')
                                    ->whereDate('date', '>=', Carbon::now()->subDays(365))
                                    ->sum('tbl_order.discount');
                                    ?>
                                     <h6>Yearly Amount of Discount </h6>
                                     <div class="peity_bar_good text-center m-t-10"><span><span style="display: none;">20,18,14,12,13,10,10</span>
                                        <canvas width="50" height="24"></canvas>
                                        </span>
                                        <h3>Last Year Discount </h3>
                                        <h3 class="mb-0 font-weight-bold"><?php echo e($yearly_discount); ?> TK</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <?php 
                            $yearly_number_cost=DB::table('tbl_cost')
                                        ->whereDate('date', '>=', Carbon::now()->subDays(365))
                                        ->get();
                        ?>
                        <h4>Yearly Number of Cost:<?php echo e(count($yearly_number_cost)); ?></h4>
                        <div class="card m-t-0">
                                <div class="col-md-6 border-left text-center p-t-10">
                                     <h6> Amount of Cost Last Year</h6>
                                    <h3 class="mb-0 font-weight-bold"><?php echo e($yearly_cost_chart); ?> TK</h3>
                                    <h3>Cost Last Year</h3>
                                    <span class="text-muted">Yearly Cost</span>
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