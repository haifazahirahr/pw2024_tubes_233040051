<?php
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$sma = query("SELECT a.*, b.nama AS nama_kategori FROM sma a JOIN kategori b ON a.kategori_id=b.id");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en"
<head>
    <meta charset="utf-8">
    <title>SMA Di Purwakarta</title>
    </head>
    <body>
    <h1>SMA Purwakarta</h1>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered border-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Akreditasi</th>
                    <th scope="col">Instagram</th>
                </tr>
                <tbody>';

$i = 1;
foreach ($sma as $row) {
    $html .= '<tr>
                    <td>' . $i . '</td>
                            <td><img src="img/' . $row["gambar"] . '" width="100px" height="100px"></td>
                            <td>' . $row["nama"] . '</td>
                            <td>' . $row["alamat"] . '</td>
                            <td>' . $row["akreditasi"] . '</td>
                            <td>' . $row["instagram"] . '</td>
                            </tr>';
}
$html .= '</table>
                </body>
                </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('data-sma.pdf', \Mpdf\Output\Destination::INLINE);
