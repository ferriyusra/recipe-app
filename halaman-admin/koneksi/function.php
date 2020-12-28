<?php
$conn = mysqli_connect("localhost", "root", "", "resepsum_resep");

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function addResep($data)
{
    global $conn;

    $nama_resep = $data['nama_resep'];
    $bahan_resep = $data['bahan_resep'];
    $cara_memasak = $data['cara_memasak'];
    $link_video_resep = $data['link_video_resep'];


    //panggil gambar
    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO resep 
                VALUES
                (null,'$nama_resep','$bahan_resep','$cara_memasak','$gambar','$link_video_resep')";

    // var_dump($query);
    // die;

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function addAkun($data)
{
    global $conn;

    $namaPengguna = strtolower(stripslashes($data['namaPengguna']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    if ($password !== $password2) {
        echo "<script> 
        alert('password tidak sesuai');
        </script>>";
        return false;
    }

    $query = "INSERT INTO user 
                VALUES
                (null,'$namaPengguna','$password')";

    // var_dump($query);
    // die;

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function EditResep($data)
{
    global $conn;

    $id_resep = $data['id_resep'];

    $nama_resep = $data['nama_resep'];
    $bahan_resep = $data['bahan_resep'];
    $cara_memasak = $data['cara_memasak'];
    $link_video_resep = $data['link_video_resep'];
    $gambarLama = $data['gambarLama'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $query = "UPDATE resep SET 
                            nama_resep='$nama_resep', 
                            bahan='$bahan_resep', 
                            cara_masak='$cara_memasak',
                            gambar_masakan='$gambar', 
                            video_masakan='$link_video_resep' 
                            WHERE id_resep= $id_resep ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function HapusResep($id_resep)
{
    global $conn;

    $query = "DELETE FROM resep WHERE id_resep= $id_resep";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yg di upload
    if ($error === 4) {
        echo "<script> alert ('Pilih gambar terlebih dahulu') </script>";
        return false;
    }

    //cek tipe gambar yang diuploaa
    $ekstensiGambarValid = ['png', 'jpg', 'jpeg'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert ('Yang di upload bukan tipe gambar') </script>";
        return false;
    }

    //cek ukuran gambar
    if ($ukuranfile > 5000000) {
        echo "<script> alert ('Ukuran gambar terlalu besar') </script>";
        return false;
    }

    //lolos pengecekan gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);
    return $namaFileBaru;
}

function addKomentar($data)
{
    global $conn;

    $id_resep = $data['id_resep'];
    $id_user = $data['id_user'];
    $isi_komentar = $data['isi_komentar'];


    $query = "INSERT INTO komentar 
                VALUES
                (null,'$id_resep','$id_user','$isi_komentar')";

    // var_dump($query);
    // die;

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusKomentar($id_komentar)
{
    global $conn;

    $query = "DELETE FROM komentar WHERE id_komentar= $id_komentar";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
