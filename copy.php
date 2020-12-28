<?php if (!isset($_SESSION['login-user'])) {
    echo '<a href="" class="btn btn-resep-details px-4" data-toggle="modal" data-target="#exampleModal">
                      Lihat Resep
                    </a>';
} else {
    echo "<a href='detail.php?id_resep={$data['id_resep']}' class='btn btn-resep-details px-4'>
                      Lihat resep
                    </a>";
}
?>

<!-- komentar -->
<?php
if ($_SESSION['nama_user'] == $k['nama_user']) {
    echo "<a href='hapus-komentar.php?id_komentar={$k['id_komentar']}' class='btn btn-danger btn-sm'>Hapus Komentar</a>";
}
?>