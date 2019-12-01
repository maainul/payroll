 
<?php $__env->startSection('content'); ?>

 <div class="row container-kamn">  
    <img src="<?php echo e(URL::to('frontend/assets/img/slider/slide9.jpg')); ?>" width="100%" class="blog-post" alt="Feature-img" align="right" width="100%"> 
</div>
<!-- Main Container -->

<div id="banners"></div>
<div class="container">
<div class="row">
    <div class="col-md-6">
         <?php $__currentLoopData = $show_team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="blockquote-box blockquote-info animated wow fadeInLeft clearfix">
            <div class="square pull-left">
                <img src="<?php echo e(URL::to($v_team->team_photo)); ?>" alt="Feature-img" height="90px" width="100px">
            </div>
            <h4>
                <?php echo e($v_team->team_name); ?>

            </h4>
            <p>
               <?php echo e($v_team->team_designation); ?>

            </p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="col-md-6">
        <?php 
            $show_team_after=DB::table('tbl_about_team')
                ->whereBetween('aboutteam_id',['6','9'])
                ->get();
        ?>
        <?php $__currentLoopData = $show_team_after; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_a_show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="blockquote-box blockquote-danger animated wow fadeInRight clearfix">
            <div class="square pull-left">
                <img src="<?php echo e(URL::to($v_a_show->team_photo)); ?>" alt="Feature-img" height="80" width="100">
            </div>
            <h4>
               <?php echo e($v_a_show->team_name); ?>

            </h4>
            <p>
                <?php echo e($v_a_show->team_designation); ?>

            </p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</div>
<!--End Main Container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>