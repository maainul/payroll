 
<?php $__env->startSection('content'); ?>

<!-- Main Container -->

<div class="container-fluid-kamn">
    <div class="row">
        <div>
            <iframe width="100%" height="450px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d911.8496911630428!2d90.39680952915835!3d23.9109296250388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c4f40daa6795%3A0x8551f3021c33e!2secopress!5e0!3m2!1sen!2sbd!4v1550730139607"></iframe>
            <br />
        </div>
        <div class="col-lg-8 col-lg-offset-1">
            <h4>Find us at:</h4>
            <h3 class="block-author"> ecopress</h3>
            <h4><i class="fa fa-map-marker" aria-hidden="true"></i>House #57, Nivrto Kunja, Ground Floor,Bonomala Road, Tongi, Gazipur</h4>
            <p><i class="fa fa-location-arrow" aria-hidden="true"></i>50 Yeards North of Bonomala Road (Back Side of Dhaka Toyopet), Tongi, Gazipur</p>
            <p><i class="fa fa-mobile" aria-hidden="true"></i> 01704174541 <i class="fa fa-phone-square" aria-hidden="true"></i> 029810276</p>
            <em class="block-author"><i class="fa fa-envelope" aria-hidden="true"></i>: ecopressbd@gmail.com </em> <br>
            <br>
            <p class="lead">Social Link</p><hr>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <a href="#"><img src="<?php echo e(URL::to('frontend/assets/img/social-icons/btn_skype.png')); ?>" alt="Skype"></a>
                Call us
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <a href="#"><img src="<?php echo e(URL::to('frontend/assets/img/social-icons/btn_facebook.png')); ?>" alt="Facebook"></a>
                Like us
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                <a href="#"><img src="<?php echo e(URL::to('frontend/assets/img/social-icons/btn_twitter.png')); ?>" alt="Twitter"></a>
                Follow us
            </div>
            <br>
        </div>
    </div>
</div>    
    
<!--End Main Container -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>