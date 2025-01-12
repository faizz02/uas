<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_users";

try {
    // Membuat koneksi dengan PDO
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Mengatur mode error PDO menjadi Exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    exit();
}
?>
