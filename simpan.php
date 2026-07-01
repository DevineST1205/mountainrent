<?php

$conn = mysqli_connect("localhost","root","","mountainrent");

$nama = $_POST['nama'];
$hp = $_POST['hp'];
$jaminan = $_POST['jaminan'];
$tgl_sewa = $_POST['tgl_sewa'];
$tgl_kembali = $_POST['tgl_kembali'];
$total_barang = str_replace(".", "", $_POST['total_barang']);;
$total_harga = str_replace(".", "", $_POST['total_harga']);
$status = "dipinjam";
$detail_alat = $_POST['detail_alat'];

mysqli_query($conn, "INSERT INTO penyewa 
(nama, hp, jaminan, tgl_sewa, tgl_kembali, total_barang, total_harga, status, detail_alat)
VALUES 
('$nama','$hp','$jaminan','$tgl_sewa','$tgl_kembali','$total_barang','$total_harga','$status','$detail_alat')");

echo "success";
?>