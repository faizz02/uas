<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    try {
        $checkEmail = $dbh->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $checkEmail->bindParam(':email', $email, PDO::PARAM_STR);
        $checkEmail->execute();

        if ($checkEmail->fetchColumn() > 0) {
            echo "Email sudah digunakan. Silakan gunakan email lain.";
        } else {
            $stmt = $dbh->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "Registrasi berhasil!";
                header("Location: sukses.php");
                exit();
            } else {
                echo "Registrasi gagal. Silakan coba lagi.";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
