<?php

require 'koneksi/function.php';

//ambil data dari url
$id_resep = $_GET['id_resep'];


//button

if (HapusResep($id_resep) > 0) {
    echo "
        <script> 
          alert('data resep berhasil dihapus');
          document.location.href= 'data-resep.php';
          </script>  ";
} else {
    echo "
        <script> 
          alert('data resep gagal dihapus');
          document.location.href= 'data-resep.php';
          </script>  ";
}
