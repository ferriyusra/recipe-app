<?php
session_start();
if (!isset($_SESSION['login-admin'])) {
    header("Location: ../login-admin.php");
    exit;
}
require 'koneksi/function.php';

if (isset($_POST['simpan'])) {
    if (addResep($_POST) > 0) {
        echo "<script> 
        alert ('Data sudah berhasil ditambahkan');
        document.location.href= 'data-resep.php';
        </script>";
    } else {
        echo "<script> 
        alert ('Data gagal ditambahkan');
        document.location.href= 'tambah.php';
        </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Tambah Data resep</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets-admin/images/favicon.ico">
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

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
                <a href="index.php" class="logo">
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
                        <li>
                            <a href="index.php" class="waves-effect"><i class="fas fa-desktop"></i><span> Dashboard
                                </span></a>
                        </li>
                        <li class="mm-active">
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

                                <h4 class="page-title">Tambah Data Resep</h4>
                            </div>

                        </div> <!-- end row -->
                    </div>
                    <!-- end page-title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama
                                                Resep</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="nama_resep" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Bahan
                                                Resep</label>
                                            <div class="col-sm-10">
                                                <textarea name="bahan_resep" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Cara
                                                Memasak</label>
                                            <div class="col-sm-10">
                                                <textarea name="cara_memasak" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Gambar
                                                Resep</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="gambar">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">link Video
                                                Resep</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="link_video_resep">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-0 float-right">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light" name="simpan">
                                                    Simpan
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                    Batal
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
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
    <script>
        CKEDITOR.replace('cara_memasak');
        CKEDITOR.replace('bahan_resep');
    </script>



</body>

</html>