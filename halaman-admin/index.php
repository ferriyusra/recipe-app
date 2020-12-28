<?php

session_start();
if (!isset($_SESSION['login-admin'])) {
    header("Location: ../login-admin.php");
    exit;
}
require 'koneksi/function.php';

$data_resep = query("SELECT * FROM resep");
$jumlah_resep = count($data_resep);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <title>Halaman Admin</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <link href="assets-admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets-admin/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets-admin/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets-admin/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span class="logo-light">
                        <i class="mdi mdi-book-multiple"></i> Sumbar Resep
                    </span>
                    <span class="logo-sm">
                        <i class="mdi mdi-book-multiple"></i>
                    </span>
                </a>
            </div>

            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">

                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none  text-danger" href="logout-admin.php">
                            Keluar <span class="mdi mdi-power"></span>
                        </a>

                    </li>



                </ul>



            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li class="mm-active">
                            <a href="index.php" class="waves-effect"><i class="fas fa-desktop"></i><span> Dashboard
                                </span></a>
                        </li>
                        <li>
                            <a href="data-resep.php" class="waves-effect"><i class="fas fa-file"></i><span> Data
                                    Resep
                                </span></a>
                        </li>
                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>

            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h3>Hi <?= $_SESSION['nama_admin']; ?></h3>
                                <h4 class="page-title">Dashboard</h4>
                            </div>

                        </div> <!-- end row -->
                    </div>
                    <!-- end page-title -->
                    <div class="row">
                        <div class="col-lg-3 col-xl-6">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Jumlah Data Resep</h5>
                                    </div>
                                    <h3 class="mt-4"><?= $jumlah_resep; ?></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->


        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="assets-admin/js/jquery.min.js"></script>
    <script src="assets-admin/js/bootstrap.bundle.min.js"></script>
    <script src="assets-admin/js/metismenu.min.js"></script>
    <script src="assets-admin/js/jquery.slimscroll.js"></script>
    <script src="assets-admin/js/waves.min.js"></script>

    <!-- App js -->
    <script src="assets-admin/js/app.js"></script>

</body>

</html>