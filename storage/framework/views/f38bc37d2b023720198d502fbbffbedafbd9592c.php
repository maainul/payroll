<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(URL::to('backend/assets/images/favicon.png')); ?>">
    <title>BEXIMCO- HRM</title>
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('backend/assets/libs/fullcalendar/dist/fullcalendar.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('backend/assets/extra-libs/calendar/calendar.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/libs/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/libs/jquery-minicolors/jquery.minicolors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/libs/quill/dist/quill.snow.css')); ?>">
    <link href="<?php echo e(asset('backend/dist/css/style.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/extra-libs/multicheck/multicheck.css')); ?>">
    <link href="<?php echo e(asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/assets/libs/flot/css/float-chart.css')); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?php echo e(URL::to('/hr-manager')); ?>">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo e(URL::to('backend/assets/images/logo-icon.png')); ?>" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="<?php echo e(URL::to('backend/assets/images/logo-text.jpg')); ?>" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                       
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo e(URL::to('backend/assets/images/users/1.jpg')); ?>" alt="user" class="rounded-circle" width="31"><i><?php echo e(Session::get('admin_name')); ?></i></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(URL::to('/logout')); ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(URL::to('/hr-manager')); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">HR Manager</span></a></li>
                       <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(URL::to('/add-office-form')); ?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Office-Unit & Dept</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-box"></i><span class="hide-menu">Dept. & Designation </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo e(URL::to('/designation-form')); ?>" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> Add Depat. & Designation </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(URL::to('/designation-list')); ?>" class="sidebar-link"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> Designation List </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cash-usd"></i><span class="hide-menu">Grade Option</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo e(URL::to('/grade-form')); ?>" class="sidebar-link"><i class="mdi mdi-credit-card-plus"></i><span class="hide-menu"> Add Grade </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(URL::to('/grade-list')); ?>" class="sidebar-link"><i class="mdi mdi-credit-card"></i><span class="hide-menu">Grade List List </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Employee</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo e(URL::to('/add-employee-form')); ?>" class="sidebar-link"><i class="mdi mdi-telegram"></i><span class="hide-menu"> Add Employee </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(URL::to('/employee-list-for-hrm')); ?>" class="sidebar-link"><i class="mdi  mdi-view-agenda"></i><span class="hide-menu"> Employee List </span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(URL::to('/festible-form')); ?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Festible</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php echo $__env->yieldContent('hrm_content'); ?>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                 All Rights Reserved by Beximco.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('backend/assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/dist/js/jquery.ui.touch-punch-improved.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/dist/js/jquery-ui.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('backend/assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/extra-libs/sparkline/sparkline.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('backend/dist/js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('backend/dist/js/sidebarmenu.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(asset('backend/dist/js/custom.min.js')); ?>"></script>
    <!-- this page js -->
    <script src="<?php echo e(asset('backend/assets/libs/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/libs/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/dist/js/pages/calendar/cal-init.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/dist/js/pages/mask/mask.init.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/libs/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/libs/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/libs/quill/dist/quill.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/extra-libs/multicheck/datatable-checkbox-init.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/extra-libs/multicheck/jquery.multicheck.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
   <!-- Chart page js -->
    <script src="<?php echo e(asset('backend/assets/libs/chart/matrix.interface.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/libs/chart/jquery.peity.min.js')); ?>"></script>
    
    //***********************************//
    <script>

        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

         /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
</body>

</html>