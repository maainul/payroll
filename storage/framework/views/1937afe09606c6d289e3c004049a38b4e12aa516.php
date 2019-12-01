<!doctype html>
<html lang="en">
    <head>

        <!-- meta data & title -->
        <meta charset="utf-8">
        <title>ecopress</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo e(URL::to('frontend/assets/ico/favicon.ico')); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(URL::to('frontend/assets/ico/apple-touch-icon-144-precomposed.png')); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(URL::to('frontend/assets/ico/apple-touch-icon-114-precomposed.png')); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(URL::to('frontend/assets/ico/apple-touch-icon-72-precomposed.png')); ?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo e(URL::to('frontend/assets/ico/apple-touch-icon-57-precomposed.png')); ?>">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/bootstrap/css/bootstrap.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/animate.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/style.css')); ?>">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo e(asset('frontend/assets/css/style-projects.css')); ?>">
    </head>
  <body>

    <!-- Header -->
        
    <nav id="navbar-section" class="navbar navbar-default navbar-static-top navbar-sticky" role="navigation">
        <div class="container">
        
            <div class="navbar-header">
                <a class="navbar-brand wow fadeInDownBig" href="<?php echo e('/'); ?>"><img class="office-logo" src="<?php echo e(URL::to('frontend/assets/img/slider/Office.png')); ?>" alt="Office"></a>      
            </div>
        
            <div id="navbar-spy" class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="<?php echo e('/'); ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo e('/about-us'); ?>">About</a>
                    </li>
                    <li>
                        <a href="<?php echo e(('/team-member')); ?>">Team</a>
                    </li>
                    <li>
                        <a href="<?php echo e(('/contact')); ?>"><span>Contact</span></a>
                    </li>
                </ul>         
            </div>
        </div>
    </nav>

    <!-- End Header -->

   <?php echo $__env->yieldContent('content'); ?>


    <!-- Footer -->
    <footer> 
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3><i class="fa fa-map-marker"></i> Contact:</h3>
                    <p class="footer-contact">
                        House #57, Nivito Kunja, Ground Floor<br>
                        Bonomala Road, Tongi,Gazipur<br>
                        Phone: 01704174541 Tel: 029810276<br>
                        Email: ecopressbd@gmail.com<br>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-external-link"></i> Links</h3>
                    <p> <a href="<?php echo e(('/about-us')); ?>"> About ( Who we are )</a></p>
                    <p> <a href="<?php echo e(('/contact')); ?>"> Contact ( Feel free to contact )</a></p>
                    <p> <a href="<?php echo e(('/team-member')); ?>"> Team ( Meet the Team )</a></p> 
                </div>
              <div class="col-md-4">
                <h3><i class="fa fa-heart"></i> Socialize</h3>
                <div id="social-icons">
                    <a href="#" class="btn-group google-plus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                      <a href="#" class="btn-group linkedin">
                        <i class="fa fa-linkedin-square"></i>
                    </a>
                      <a href="#" class="btn-group twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                      <a href="#" class="btn-group facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
              </div>    
        </div>
      </div>
    </footer>

    
    <div class="copyright text center">
        <p>&copy; Copyright 2019, <a href="#"></a> Developed by <a href="#" target="_blank">Shaan</a></p>
    </div>

    
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery-1.10.2.min.j')); ?>s"></script>
    <script src="<?php echo e(asset('frontend/assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
    <script>
      new WOW().init();
    </script>
  </body>
</html>
