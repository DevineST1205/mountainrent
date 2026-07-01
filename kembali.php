<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,
    "UPDATE penyewa
     SET status='dikembalikan'
     WHERE id='$id'"
);

header("Location: riwayat.php");
exit;
?>