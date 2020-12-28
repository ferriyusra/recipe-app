<?php
session_start();
if (!isset($_SESSION['login-admin'])) {
    header("Location: ../login-admin.php");
    exit;
}
require 'koneksi/function.php';

$data_resep = query("SELECT * FROM resep");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <title>Data Resep</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <!-- DataTables -->
    <link href="assets-admin/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets-admin/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets-admin/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="assets-admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets-admin/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets-admin/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets-admin/css/style.css" rel="stylesheet" type="text/css" />
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
                        <i class="mdi mdi-camera-control"></i> Sumbar Resep
                    </span>
                    <span class="logo-sm">
                        <i class="mdi mdi-camera-control"></i>
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
                            </a>
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
                                <h4 class="page-title">Data Resep</h4>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <a href="tambah-resep.php" class="btn btn-md btn-primary mb-3 ml-3">
                                        Tambah Data Resep
                                    </a>

                                    <table id="datatable" class="table table-responsive table-bordered dt-responsive nowrap" style="
                        border-collapse: collapse;
                        border-spacing: 0;
                        width: 100%;
                      ">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Resep</th>
                                                <th>Bahan</th>
                                                <th>Cara Masak</th>
                                                <th>Gambar Resep</th>
                                                <th>Url Video Masakan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($data_resep as $data) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $i; ?></td>
                                                    <td><?= $data['nama_resep']; ?></td>
                                                    <td><?= $data['bahan']; ?></td>
                                                    <td><?= $data['cara_masak']; ?></td>
                                                    <td>
                                                        <img class="img-fluid" style="width: 50%;" src="gambar/<?= $data['gambar_masakan']; ?>">
                                                    </td>
                                                    <td><?= $data['video_masakan']; ?></td>
                                                    <td>
                                                        <a href="ubah-resep.php?id_resep=<?= $data['id_resep']; ?>" class="btn btn-success btn-md">Ubah</a>
                                                        <a href="hapus-resep.php?id_resep=<?= $data['id_resep']; ?>" onclick="return confirm('Ingin menghapus data?')" class="btn btn-danger btn-md">Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

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

    <!-- Required datatable js -->
    <script src="assets-admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets-admin/plugins/datatables/dataTables.bootstrap4.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "language": {
                    "lengthMenu": " Tampilkan _MENU_ Data Per Halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data satupun yang ditemukan",
                    "infoFiltered": "(berdasrkan filter data yang ada)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                }
            });
        });
    </script>

</body>

</html>