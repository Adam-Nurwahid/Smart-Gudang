<?php
include 'inc_koneksi.php';

// Tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Validasi kolom tidak boleh kosong
if (empty($username) || empty($password)) {
    header("Location: register.php?error=Username dan password harus diisi!");
    exit();
}

// Enkripsi password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query untuk memasukkan data ke database
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    header("Location: login.php?success=Registrasi berhasil! Silakan login.");
    exit();
} else {
    header("Location: register.php?error=Registrasi gagal. Silakan coba lagi.");
    exit();
}

$stmt->close();
$koneksi->close();
?>
