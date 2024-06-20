<?php
session_start();
include 'inc_koneksi.php';

// Tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Validasi kolom tidak boleh kosong
if (empty($username) || empty($password)) {
    header("Location: login.php?error=Username dan password harus diisi!");
    exit();
}

// Query untuk mencari pengguna dengan username yang cocok
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Memeriksa password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password cocok, buat session
        $_SESSION['username'] = $username;
        header("Location: halaman.php"); // Arahkan ke dashboard.php
        exit(); // Pastikan untuk menghentikan skrip setelah pengalihan
    } else {
        header("Location: login.php?error=Password salah!"); // Arahkan kembali ke login dengan pesan error
        exit();
    }
} else {
    header("Location: login.php?error=Username tidak ditemukan!"); // Arahkan kembali ke login dengan pesan error
    exit();
}

$stmt->close();
$koneksi->close();
?>
