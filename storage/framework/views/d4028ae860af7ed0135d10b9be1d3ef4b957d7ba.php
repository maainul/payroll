 
<?php $__env->startSection('content'); ?>
 <!-- Main Container -->

    <div class="row container-kamn">
        <img src="<?php echo e(URL::to('frontend/assets/img/slider/slide1.jpg')); ?>" class="blog-post" alt="Feature-img" align="right" width="100%"> 
    </div>

    <div id="banners"></div>
    <div class="container">   
        <div class="row">
            <div class="side-left col-sm-4 col-md-4">

                <h3 class="lead">  About our Press : </h3><hr>

                <p><?php echo e(strip_tags($show_about_us->about_title)); ?></p>
            </div>
            <div class="col-sm-8 col-md-8">
                <h3 class="lead"id="anchor1"> Our Press History </h3><hr>
                <p style="text-align: justify;">
                    <?php echo e(strip_tags($show_about_us->about_description)); ?>

                </p>
                <h3 class="lead"id="anchor3">In the Press:-Md. Touhidul Islam</h3>
                <blockquote>
                    <em><?php echo e(strip_tags($show_about_us->about_message)); ?></em>
                </blockquote>
            </div>  
        </div>    
    </div>  

    <!--End Main Container -->
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>