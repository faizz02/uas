<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kategori = $_POST['nama_kategori']; 

    try {
        // Query untuk memasukkan data ke tabel kategori
        $stmt = $dbh->prepare("INSERT INTO kategori (nama_kategori) VALUES (:nama_kategori)");
        $stmt->bindParam(':nama_kategori', $nama_kategori, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Redirect ke dashboard dengan pesan sukses
            header("Location: dashboard.php?message=success");
            exit();
        } else {
            echo "Gagal menambahkan data kategori.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Jika metode request bukan POST, redirect ke halaman dashboard
    header("Location: dashboard.php");
    exit();
}
?>
