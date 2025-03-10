<?php
$host = "localhost";
$user = "root"; // default user XAMPP
$pass = ""; // kosong jika pakai XAMPP
$db = "fresh_market";

// koneksi ke MySQL
$conn = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>
