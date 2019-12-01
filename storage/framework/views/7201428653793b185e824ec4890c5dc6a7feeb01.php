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
            <h4 class="page-title">Cost Detail</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Cost</li>
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
            <form class="form-horizontal" action="<?php echo e(url('/update-cost/'.$cost_detail->cost_id)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">
                    <h4 class="card-title">Update Cost Detail</h4>
                     <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Date</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="date" data-toggle="tooltip" title="Give Date!" value="<?php echo e($cost_detail->date); ?>" class="form-control"  name="date" placeholder="Hover For tooltip" required="">
                        </div>
                    </div>
                     <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Select Cost Purpose</span>
                        </div>
                            <div class="col-lg-8 col-md-12">
                            <select class="select2 form-control " name="cost_purpose">
                                <?php if($cost_detail->cost_purpose==1): ?>
                               <option value="1">Previous Bill--Office Rent</option>
                                <?php elseif($cost_detail->cost_purpose==2): ?>
                                <option value="2">Previous Bill--Current Bill</option>
                                <?php elseif($cost_detail->cost_purpose==3): ?>
                                <option value="3">Previous Bill--Internet Bill</option>
                                <?php elseif($cost_detail->cost_purpose==4): ?>
                                <option value="4">Previous Bill--Water Bill</option>
                                <?php elseif($cost_detail->cost_purpose==5): ?>
                                <option value="5">Previous Bill--Paper Bill</option>
                                <?php elseif($cost_detail->cost_purpose==6): ?>
                                <option value="6">Previous Bill--Tiffin Bill</option>
                                <?php elseif($cost_detail->cost_purpose==7): ?>
                                <option value="7">Previous Bill--Transport Bill</option>
                                <?php elseif($cost_detail->cost_purpose==8): ?>
                                <option value="8">Previous Bill--Media Bill</option>
                                <?php elseif($cost_detail->cost_purpose==9): ?>
                                <option value="9">Previous Bill--Other Bill</option>
                                <?php endif; ?>
                                <option value="1">Office Rent</option>
                                <option value="2">Current Bill</option>
                                <option value="3">Internet Bill</option>
                                <option value="4">Water Bill</option>
                                <option value="5">Paper Bill</option>
                                <option value="6">Tiffin Bill</option>
                                <option value="7">Transport Bill</option>
                                <option value="8">Media Bill</option>
                                <option value="9">Other Bill</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 col-md-12 text-right">
                            <span>Total Amount</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?php echo e($cost_detail->cost_amount); ?>" name="total_amount" aria-label="Recipient 's username" aria-describedby="basic-addon2" >
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">TK</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Update Bill</button>
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
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>