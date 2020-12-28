<?php

session_start();
require 'halaman-admin/koneksi/function.php';

$data_resep = query("SELECT * FROM resep ORDER BY id_resep desc limit 3");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Beranda Resep</title>
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
            <a href="index.php" class="nav-link active">Beranda</a>
          </li>
          <li class="nav-item mx-md-2">
            <a href="daftar-resep.php" class="nav-link">Daftar Resep</a>
          </li>
          <?php

          if (!isset($_SESSION['login-user'])) {
            echo '<li class="nav-item mx-md-2">
                <a href="daftar-akun.php" class="nav-link">Daftar Akun</a>
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

            echo '<form class="form-inline d-sm-block d-md-none">
              <button class="btn btn-login my-2 my-sm-0 px-4 disabled">Admin</button>
            </form>';

            echo '<form class="form-inline my-2 my-lg-0 d-none d-md-block" style ="margin-right:-14px;">
              <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4 disabled">
                Admin
              </button>
            </form>';
          }

          ?>
        </ul>
      </div>
    </nav>
  </div>
  <!-- end navbar -->

  <!-- header -->
  <header class="text-center">
    <h1>
      Menjelajahi Resep Masakan
      <br />
      Khas Sumatera Barat
    </h1>
    <p class="mt-3">
      Lezat nya masakan khas Sumatera Barat
      <br />
      menjadikan resep masakan untuk keluarga
    </p>


  </header>
  <!-- end header -->

  <!-- content -->
  <main>
    <section class="section-popular" id="popular">
      <div class="container">
        <div class="row">
          <div class="col text-center section-popular-heading">
            <h2>Resep Terbaru</h2>
            <p>Resep terbaru mesti kamu coba dirumah</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-popular-content" id="popularContent">
      <div class="container">
        <div class="section-popular-resep row justify-content-center">
          <?php foreach ($data_resep as $data) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="card-resep text-center d-flex flex-column text-center" style="
                  background-image: url('halaman-admin/gambar/<?= $data['gambar_masakan']; ?>');
                 ">
                <div class="nama-makanan"><?= $data['nama_resep']; ?></div>
                <div class="resep-button mt-auto">

                  <a href="detail.php?id_resep=<?= $data['id_resep'] ?>" class="btn btn-resep-details px-4">
                    Lihat resep
                  </a>
                  ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="alert alert-danger modal-title" role="alert">
            <h5 class="text-bold">
              Login Dulu Ya Untuk Melihat Resep!!
            </h5>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <a href="" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
          <a href="login.php" type="button" class="btn btn-primary">Login Akun</a>
        </div>
      </div>
    </div>
  </div>
  <script src="front-end/libraries/bootstrap_v4/js/jquery-3.4.1.min.js"></script>
  <script src="front-end/libraries/bootstrap_v4/js/bootstrap.js"></script>
  <script src="front-end/libraries/bootstrap_v4/js/popper.min.js"></script>
  <!-- <script src="front-end/libraries/retina/retina.min.js"></script> -->
</body>

</html>