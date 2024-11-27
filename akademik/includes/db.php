<?php
$host = 'localhost';
$user = 'root';  // sesuaikan dengan username MySQL Anda
$pass = '';      // sesuaikan dengan password MySQL Anda
$dbname = 'akademik';  // nama database Anda

// Menghubungkan ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
