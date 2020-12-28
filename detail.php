<?php

session_start();
require 'halaman-admin/koneksi/function.php';

if (isset($_SESSION['login-user'])) {
  $nama_user = $_SESSION['login-user'];
  $id_user = $_SESSION['id_user'];
} else {
  $nama_user = null;
  $id_user = null;
}


// var_dump($_SESSION);
// die;

if (isset($_POST['kirim'])) {
  if (isset($_SESSION['login-user'])) {
    if (addKomentar($_POST) > 0) {
      echo "<script> 
      alert ('Komentar sudah berhasil ditambahkan');
      document.location.href= 'index.php';
      </script>";
    } else {
      echo "<script> 
        alert ('Komentar gagal ditambah');
        document.location.href= 'login.php';
        </script>";
    }
  }
  echo "<script> 
  alert ('Login untuk berkomentar');
  document.location.href= 'login.php';
  </script>";
}

$id_resep = $_GET['id_resep'];
$resep_detail = query("SELECT * FROM resep where id_resep=$id_resep")[0];

$komentar = query("SELECT komentar.id_komentar, komentar.id_resep, komentar.id_user, komentar.isi_komentar, user.nama_user FROM komentar JOIN resep ON komentar.id_resep = resep.id_resep JOIN user ON komentar.id_user = user.id_user WHERE komentar.id_resep =$id_resep ORDER BY id_komentar DESC ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Detail Resep</title>
  <link rel="stylesheet" href="front-end/libraries/bootstrap_v4/css/bootstrap.css" />
  <link rel="stylesheet" href="front-end/libraries/fontawesome/css/all.css" />
  <link rel="stylesheet" href="front-end/styles/main.css" />
  <link rel="stylesheet" href="front-end/libraries/xzoom/xzoom.css" />
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
            <a href="index.php" class="nav-link">Beranda</a>
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
      </div>
    </nav>
  </div>
  <!-- end navbar -->

  <main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
      <div class="container">
        <div class="row">
          <div class="col p-0">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                  <?= $resep_detail['nama_resep']; ?>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Resep Detail
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7 pl-lg-0">
            <div class="card card-details">
              <h1><?= $resep_detail['nama_resep']; ?></h1>
              <p>Resep Khas Sumatera Barat</p>
              <div class="gallery">
                <div class="xzoom-container">
                  <img class="xzoom" id="xzoom-default" src="halaman-admin/gambar/<?= $resep_detail['gambar_masakan']; ?>" xoriginal="front-end/images/header-resep/r1.png" />
                </div>
                <h2>Cara Memasak</h2>
                <?= $resep_detail['cara_masak']; ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="mt-2">
                      <h2>Video Cara Memasak</h2>
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="<?= $resep_detail['video_masakan']; ?>" class="embed-responsive-item"></iframe>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card card-details card-right">
              <h2>Bahan-Bahan</h2>
              <hr />
              <table class="informasi-bahan">
                <tr>
                  <th width="50%">
                    <?= $resep_detail['bahan']; ?>
                  </th>
                </tr>
              </table>
              <a href="cetak.php?id_resep=<?= $resep_detail['id_resep'] ?>" class="btn btn-warning px-4" style="color:white" target="_blank">
                Download Resep
              </a>
            </div>
            <div class="join-container">
              <button disabled class="btn btn-block btn-join-now mt-3 py-2"></button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="komentar p-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="komentar-tab" data-toggle="tab" href="#komentar" role="tab" aria-controls="komentar" aria-selected="true">Komentar</a>
              </li>

            </ul>
            <div class="tab-content p-3" id="myTabContent">
              <div class="tab-pane fade show active komentar-list" id="komentar" role="tabpanel" aria-labelledby="komentar-tab">
                <?php foreach ($komentar as $k) : ?>
                  <div class="row">
                    <div class="col">
                      <h5> <?= $k['nama_user']; ?></h5>
                      <p><?= $k['isi_komentar']; ?></p>
                      <!-- cek user komentar -->
                      <?php
                      if (!isset($_SESSION['login-user'])) {
                        echo '<div class="alert alert-danger" role="alert">Untuk memberi komentar hanya terdapat pada saat login akun</div>';
                      } else {
                        if ($_SESSION['nama_user'] === $k['nama_user']) {
                          echo "<a href='hapus-komentar.php?id_komentar={$k['id_komentar']}' class='btn btn-danger btn-sm'>Hapus Komentar</a>";
                        } else if ($_SESSION['nama_user'] !== $k['nama_user']) {
                          echo null;
                        }
                      }
                      ?>
                      <hr>
                    </div>
                  </div>
                <?php endforeach; ?>
                <div class="row mt-4">
                  <div class="col-lg-12">
                    <form action="" method="POST" class="mb-1">
                      <input type="hidden" name="id_resep" value="<?= $resep_detail['id_resep'] ?>">
                      <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                      <div class="input-group">
                        <textarea class="form-control mr-3" name="isi_komentar" required></textarea>
                      </div>
                      <button class="btn btn-daftar mt-2" type="submit" name="kirim">Kirim Komentar</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- footer -->
  <footer class="section-footer  mb-4 border-top" style="margin-top:200px ;">
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
  <script src="front-end/libraries/xzoom/xzoom.min.js"></script>
</body>

</html>