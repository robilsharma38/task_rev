<!DOCTYPE html>
    <html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('public/admin/images/favicon.ico')}}">
        <!-- third party css -->
        <link href="{{url('public/admin/css/vendor/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/vendor/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/vendor/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/vendor/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <!-- App css -->
        <link href="{{url('public/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{url('public/admin/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->


            <div class="left-side-menu">

                    <!-- LOGO -->
                    <div class="h-100" id="left-side-menu-container" style="margin-top:20px;" data-simplebar>
                        <!--- Sidemenu -->
                        <ul class="metismenu side-nav">
                            <li class="side-nav-title side-nav-item">Navigation</li>
                            <li class="side-nav-item">
                                <a href="{{url('/')}}" class="side-nav-link">
                                    <i class="uil-home-alt"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{route('teacher.index')}}" class="side-nav-link">
                                    <i class="uil-briefcase"></i>
                                    <span> Teacher </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{route('student.index')}}" class="side-nav-link">
                                    <i class="uil-briefcase"></i>
                                    <span> Student </span>
                                </a>
                            </li>
                        </ul>

                        <div class="clearfix"></div>

                    </div>
                    <!-- Sidebar -left -->

                </div>


            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
            @yield('content')
            <!-- Footer Start -->
            <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <!-- bundle -->
        <script src="{{url('public/admin/js/vendor.min.js')}}"></script>
        <script src="{{url('public/admin/js/app.min.js')}}"></script>

        <!-- third party js -->
        <script src="{{url('public/admin/js/vendor/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.bootstrap4.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/buttons.html5.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/buttons.flash.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/buttons.print.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.keyTable.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.select.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/apexcharts.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{url('public/admin/js/pages/demo.datatable-init.js')}}"></script>
        <script src="{{url('public/admin/js/pages/demo.dashboard.js')}}"></script>
        <script src="{{url('public/admin/js/pages/demo.profile.js')}}"></script>
        <!-- end demo js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
        <script>
         @yield('javascript')
      </script>
    </body>
</html>
