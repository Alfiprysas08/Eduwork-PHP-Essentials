<?php
// process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama      = htmlspecialchars(trim($_POST["nama"] ?? ""), ENT_QUOTES, "UTF-8");
    $harga_raw = trim($_POST["harga"] ?? "");
    $deskripsi = htmlspecialchars(trim($_POST["deskripsi"] ?? ""), ENT_QUOTES, "UTF-8");

    // Validasi sederhana
    if ($nama === "" || $harga_raw === "" || $deskripsi === "") {
        echo "Semua field wajib diisi.";
        exit;
    }

    // Pastikan harga angka
    if (!is_numeric($harga_raw)) {
        echo "Harga harus berupa angka.";
        exit;
    }

    // (Opsional) rapikan format harga
    $harga = htmlspecialchars($harga_raw, ENT_QUOTES, "UTF-8");

    // Output sesuai contoh
    echo "<h1>Form Data Received</h1>";

    echo "<p><strong>Name:</strong> $nama</p>";
    echo "<p><strong>Harga:</strong> $harga</p>";

    echo "<p><strong>Deskripsi:</strong><br>";
    echo nl2br($deskripsi) . "</p>";

} else {
    echo "No data received.";
}
?>