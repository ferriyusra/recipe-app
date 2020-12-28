<?php

require 'halaman-admin/koneksi/function.php';

//ambil data dari url
$id_komentar = $_GET['id_komentar'];


//button

if (hapusKomentar($id_komentar) > 0) {
    echo "
        <script> 
          alert('Komentar berhasil dihapus');
          document.location.href= 'index.php';
          </script>  ";
} else {
    echo "
        <script> 
          alert('Komentar gagal dihapus');
          document.location.href= 'index.php';
          </script>  ";
}
