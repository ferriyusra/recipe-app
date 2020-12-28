<?php
require 'halaman-admin/koneksi/function.php';
$id_resep = $_GET['id_resep'];
$resep_detail = query("SELECT * FROM resep where id_resep=$id_resep")[0];

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Resep</title>
  <link rel="stylesheet" href="front-end/styles/print/main.css" />
</head>

<body>
    <h1>Daftar Resep atau bahan ' . $resep_detail['nama_resep'] . ' dan cara memasak</h1>
    <table id="customers">
		<tr>
			<th>Nama Resep</th>
			<th>Cara Masak</th>
			<th>Bahan-Bahan</th>
        </tr>';



$html .= '<tr>
                <td>' . $resep_detail["nama_resep"] . '</td>
                <td>' . $resep_detail["cara_masak"] . '</td>
                <td>' . $resep_detail["bahan"] . '</td>
            </tr>';


$html .= '</table>
</body>

</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('resep_' . $resep_detail['nama_resep'] . '.pdf', \Mpdf\Output\Destination::DOWNLOAD);
