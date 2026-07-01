<?php
include "koneksi.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM penyewa
     WHERE status='dikembalikan'
     ORDER BY id DESC"
);
?>

<h2>History Penyewa</h2>

<table border="1">
<tr>
    <th>Nama</th>
    <th>No HP</th>
    <th>Jaminan</th>
    <th>Tanggal Sewa</th>
    <th>Tanggal Kembali</th>
    <th>Total Barang</th>
    <th>Total Harga</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)){ ?>
<tr>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['hp'] ?></td>
    <td><?= $row['jaminan'] ?></td>
    <td><?= $row['tgl_sewa'] ?></td>
    <td><?= $row['tgl_kembali'] ?></td>
    <td><?= $row['total_barang'] ?></td>
    <td>Rp <?= number_format($row['total_harga'],0,",",".") ?></td>
</tr>
<?php } ?>

</table>