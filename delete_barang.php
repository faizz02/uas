<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan id adalah integer

    try {
        // Query untuk menghapus data dari tabel barang
        $stmt = $dbh->prepare("DELETE FROM barang WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect ke dashboard dengan pesan sukses
        header("Location: dashboard.php?message=deleted");
        exit;
    } catch (PDOException $e) {
        // Menampilkan pesan error jika terjadi kesalahan
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request. ID tidak ditemukan.";
}
?>
