<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('backend/dist/css/pdf.css')); ?>" rel="stylesheet">
</head>
<body>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
       <?php echo $__env->yieldContent('pdf_content'); ?>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <br>
            <footer class="footer text-center">
                All Rights Reserved by Beximco. Designed and Developed by <a href="#"></a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
</body>

</html>