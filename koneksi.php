<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "toko"; // <-- ganti ke database kamu

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi berhasil!";

?>