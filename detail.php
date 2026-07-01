<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn,
    "SELECT * FROM penyewa WHERE id='$id'");

$row = mysqli_fetch_assoc($query);
?>

<h2>Detail Penyewaan</h2>

<p><b>Nama:</b> <?= $row['nama'] ?></p>

<p><b>No HP:</b> <?= $row['hp'] ?></p>

<p><b>Jaminan:</b> <?= $row['jaminan'] ?></p>

<p><b>Tanggal Sewa:</b> <?= $row['tgl_sewa'] ?></p>

<p><b>Tanggal Kembali:</b> <?= $row['tgl_kembali'] ?></p>

<p><b>Daftar Alat:</b></p>

<ul>
<?php
$alat = explode(",", $row['detail_alat']);

foreach($alat as $item){
    if(trim($item) != ""){
        echo "<li>$item</li>";
    }
}
?>
</ul>

<p><b>Total Barang:</b> <?= $row['total_barang'] ?></p>

<p><b>Total Harga:</b>
Rp <?= number_format($row['total_harga'],0,",",".") ?>
</p>
