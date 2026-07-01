<?php
$conn = mysqli_connect("localhost", "root", "", "mountainrent");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Penyewa</title>
    <style>
        #alatSection{
            display:none;
        }
    </style>
</head>
<body>


<form id="formPenyewa">
    <h2>Data Penyewa</h2>

Nama Lengkap:
<br>
<input type="text" name="nama" required>

<br><br>

No. HP:
<br>
<input type="text" name="hp" required>

<br><br>

Jaminan:
<br>
<select name="jaminan" required>
    <option value="">-Pilih Jaminan-</option>
    <option value="KTP">KTP</option>
    <option value="SIM">SIM</option>
    <option value="KTM">KTM</option>
</select>

<br><br>

Tanggal Sewa:
<br>
<input type="date" name="tgl_sewa" required>

<br><br>

Tanggal Kembali:
<br>
<input type="date" name="tgl_kembali" required>

<br><br>

<button type="button" onclick="lanjut()">
    Lanjut Pilih Alat
</button>
</form>

<div id="alatSection" style="display: none;">
<h2>Daftar Harga Rental</h2>

<table border="1">
    <tr>
        <th>Perlengkapan</th>
        <th>1 Malam</th>
        <th>2 Malam</th>
        <th>3 Malam</th>
    </tr>

    <?php
    $query = mysqli_query($conn, "SELECT * FROM alat");

    while($row = mysqli_fetch_assoc($query)){
    ?>

    <tr>
        <td><?= $row['perlengkapan']; ?></td>
        <td>Rp <?= number_format($row['1_malam'],0,",","."); ?></td>
        <td>Rp <?= number_format($row['2_malam'],0,",","."); ?></td>
        <td>Rp <?= number_format($row['3_malam'],0,",","."); ?></td>
    </tr>

    <?php
    }
    ?>
</table>

<h2>Pilih Alat Rental</h2>

<table border="1" id="tabelPilih">

<tr>
    <th>Nama Alat</th>
    <th>Lama Sewa</th>
    <th>Jumlah</th>
</tr>

<tr>
<tr>
        <td>
            <select class="alat">
                <option value="">--Pilih Alat--</option>

                <?php
                $query = mysqli_query($conn,"SELECT * FROM alat");
                while($row=mysqli_fetch_assoc($query)){
                ?>
                    <option
                        value="<?= $row['perlengkapan'] ?>"
                        data-h1="<?= $row['1_malam'] ?>"
                        data-h2="<?= $row['2_malam'] ?>"
                        data-h3="<?= $row['3_malam'] ?>"
                    >
                        <?= $row['perlengkapan'] ?>
                    </option>
                <?php } ?>
            </select>
        </td>
<td>
<select class="lama">
    <option value="1">1 Malam</option>
    <option value="2">2 Malam</option>
    <option value="3">3 Malam</option>
</select>
</td>

<td>
<input type="number" class="jumlah" min="" value="1">
</td>
</tr>
</table>
<br>
<button type="button" onclick="tambahBaris()">
    Tambah Alat
</button>

<br>

<h3>Total Barang: <span id="totalBarang">0</span></h3>

<h3>Total Harga: Rp <span id="totalHarga">0</span></h3>

<button type="button" onclick="selesaiSewa()">
    Selesai
</button>
</div>

    <script src="script.js"></script>
</body>
</html>