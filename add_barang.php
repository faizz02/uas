<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = trim($_POST['nama_barang']);
    $harga = floatval($_POST['harga']);
    $stok = intval($_POST['stok']);
    $kategori_id = intval($_POST['kategori_id']);

    // validasi input
    if (empty($nama_barang) || $stok < 0 || $kategori_id <= 0 || $harga <= 0) {
        echo "Input tidak valid. Pastikan semua kolom diisi dengan benar.";
        exit();
    }

    try {
        // query untuk memasukkan data ke tabel barang
        $stmt = $dbh->prepare("
            INSERT INTO barang (nama_barang, harga, stok, kategori_id) 
            VALUES (:nama_barang, :harga, :stok, :kategori_id)
        ");
        $stmt->bindParam(':nama_barang', $nama_barang, PDO::PARAM_STR);
        $stmt->bindParam(':harga', $harga, PDO::PARAM_STR);
        $stmt->bindParam(':stok', $stok, PDO::PARAM_INT);
        $stmt->bindParam(':kategori_id', $kategori_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: dashboard.php?message=success");
            exit();
        } else {
            echo "Gagal menambahkan data barang.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>