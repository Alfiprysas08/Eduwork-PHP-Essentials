<?php
include "koneksi.php";

// Ambil kategori dari URL
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Query berdasarkan kategori
if ($kategori != '') {
    $query = "SELECT * FROM product WHERE kategori = '$kategori'";
} else {
    $query = "SELECT * FROM product";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce Sederhana</title>
</head>
<body>

<h2>Daftar Produk</h2>

<!-- Filter -->
<p>
    <b>Filter Kategori:</b>
    <a href="index.php">Semua</a> |
    <a href="index.php?kategori=elektronik">Elektronik</a> |
    <a href="index.php?kategori=buku">Buku</a>
</p>

<?php if (mysqli_num_rows($result) > 0): ?>
    
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        
        <div style="border:1px solid black; padding:10px; margin:10px 0;">
            <h3><?php echo $row['nama_produk']; ?></h3>
            <p><?php echo $row['deskripsi']; ?></p>
            <p><b>Harga:</b> Rp <?php echo number_format($row['harga']); ?></p>
            <p><b>Stok:</b> <?php echo $row['stok']; ?></p>
            <p><b>Kategori:</b> <?php echo $row['kategori']; ?></p>
        </div>

    <?php endwhile; ?>

<?php else: ?>
    <p>Produk tidak ditemukan.</p>
<?php endif; ?>

</body>
</html>