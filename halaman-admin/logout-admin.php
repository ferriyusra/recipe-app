<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
echo "<script> 
  alert('berhasil logout halaman admin');
  document.location.href= '../index.php';
  </script>  ";
exit;
