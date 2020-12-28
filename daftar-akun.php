<?php

require 'halaman-admin/koneksi/function.php';

if (isset($_POST['daftar'])) {
    if (addAkun($_POST) > 0) {
        echo "
      <script> 
        alert('akun baru berhasil ditambah');
        document.location.href= 'login.php';
        </script>  ";
    } else {
        mysqli_error($conn);
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="front-end/libraries/bootstrap_v4/css/bootstrap.css" />
    <link rel="stylesheet" href="front-end/styles/main.css" />
</head>

<body>
    <!-- navbar -->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a href="#" class="navbar-brand">
                <img src="front-end/images/header-resep/logo_nomads.png" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a href="index.php" class="nav-link ">Beranda</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="daftar-resep.php" class="nav-link">Daftar Resep</a>
                    </li>
                    <?php

                    if (!isset($_SESSION['login-user'])) {
                        echo '<li class="nav-item mx-md-2">
      <a href="daftar-akun.php" class="nav-link active">Daftar Akun</a>
    </li>';
                        echo '<li class="nav-item mx-md-2">
      <a href="login.php" class="nav-link">Login Akun</a>
    </li>';

                        echo '<form action="login-admin.php" method="" class="form-inline d-sm-block d-md-none" >
    <button class="btn btn-login my-2 my-sm-0 px-4">Admin</button>
  </form>';

                        echo '<form action="login-admin.php" method="" class="form-inline my-2 my-lg-0 d-none d-md-block" style ="margin-right:-14px;">
    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
      Admin
    </button>
  </form>';

                    ?>
                    <?php
                    } else {
                        echo "<li class='nav-item mx-md-2'>
      <a href='' class='nav-link'>{$_SESSION['nama_user']}</a>
    </li>";
                        echo '<li class="nav-item mx-md-2">
      <a href="logout-user.php" class="nav-link">Logout Akun</a>
    </li>';

                        echo '<form action="login-admin.php" method="" class="form-inline d-sm-block d-md-none">
    <button class="btn btn-login my-2 my-sm-0 px-4 disabled">Admin</button>
  </form>';

                        echo '<form action="login-admin.php" method="" class="form-inline my-2 my-lg-0 d-none d-md-block" style ="margin-right:-14px;">
    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4 disabled">
      Admin
    </button>
  </form>';
                    }

                    ?>
            </div>
        </nav>
    </div>
    <!-- end navbar -->



    <!-- content -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Daftar Akun</h5>
                            <form class="form-signin" method="POST" action="">
                                <div class="form-label-group">
                                    <input type="text" id="namapengguna" class="form-control" placeholder="Nama Pengguna" name="namaPengguna" required autofocus>
                                    <label for="namapengguna">Nama Pengguna</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="password1" class="form-control" name="password" placeholder="Kata Sandi" required>
                                    <label for="password1">Kata Sandi</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="password2" class="form-control" name="password2" placeholder="Konfirmasi Kata Sandi" required>
                                    <label for="password2">Konfirmasi Kata Sandi</label>
                                </div>

                                <button class="btn btn-lg btn-daftar btn-block text-uppercase" type="submit" name="daftar">Daftar
                                    Akun</button>
                                <a class="d-block text-center mt-2 small" style="color:#ffb366;" href="login.php">Sudah
                                    punya akun? Login</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end content -->

    <!-- footer -->
    <footer class="section-footer mt-5 mb-4 border-top">
        <div class="container-fluid">
            <div class="row border-top justify-content-center align-items-center pt-4">
                <div class="col-auto text-gray-500 font-weight-light">
                    Resep Masakan Khas Sumatera Barat
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <script src="front-end/libraries/bootstrap_v4/js/jquery-3.4.1.min.js"></script>
    <script src="front-end/libraries/bootstrap_v4/js/bootstrap.js"></script>
    <script src="front-end/libraries/bootstrap_v4/js/popper.min.js"></script>
    <!-- <script src="front-end/libraries/retina/retina.min.js"></script> -->
</body>

</html>