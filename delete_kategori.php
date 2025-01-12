<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Memastikan id adalah bilangan bulat

    try {
        // Hapus semua barang yang terkait dengan kategori ini terlebih dahulu
        $stmt = $dbh->prepare("DELETE FROM barang WHERE kategori_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Hapus kategori
        $stmt = $dbh->prepare("DELETE FROM kategori WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect ke dashboard dengan pesan sukses
        header("Location: dashboard.php?message=kategori_deleted");
        exit;
    } catch (PDOException $e) {
        // Menampilkan pesan error jika terjadi kesalahan
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request. ID tidak ditemukan.";
}
?>
