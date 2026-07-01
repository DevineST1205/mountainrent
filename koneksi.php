<?php
$conn = mysqli_connect("localhost", "root", "", "mountainrent");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>