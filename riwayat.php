<?php
include "koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM penyewa WHERE status='dipinjam' ORDER BY id DESC");
?>

<h2>Riwayat Penyewa</h2>

<table border="1">
<tr>
    <th>Nama</th>
    <th>No.Hp</th>
    <th>Jaminan</th>
    <th>Tanggal Sewa</th>
    <th>Tanggal Kembali</th>
    <th>Total Barang</th>
    <th>Total Harga</th>
    <th>Status</th>
    <th>Keterangan</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)) { ?>
<tr>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['hp'] ?></td>
    <td><?= $row['jaminan'] ?></td>
    <td><?= $row['tgl_sewa'] ?></td>
    <td><?= $row['tgl_kembali'] ?></td>
    <td><?= $row['total_barang'] ?></td>
    <td>Rp <?= number_format($row['total_harga'],0,",",".") ?></td>
    <td>
    <select onchange="ubahStatus(this, <?= $row['id'] ?>)">
        <option value="dipinjam"
            <?= $row['status']=="dipinjam" ? "selected" : "" ?>>
            Dipinjam
        </option>

        <option value="dikembalikan">
            Dikembalikan
        </option>
    </select>
</td>
<td>
    <a href="detail.php?id=<?= $row['id'] ?>">
        Detail
    </a>
</td>
</tr>
<?php } ?>
</table>

<a href="history.php" style="
    position:fixed;
    top:10px;
    right:10px;
    padding:10px;
    background:black;
    color:white;
    text-decoration:none;
">
    HISTORY
</a>

<script>
function ubahStatus(select, id){

    if(select.value === "dikembalikan"){

        let yakin = confirm(
            "Masukkan data ini ke History?"
        );

        if(yakin){

            window.location.href =
            "ubah_status.php?id=" + id;

        }else{

            select.value = "dipinjam";

        }
    }
}
</script>
