<?php
// Pengaturan koneksi database
$host       = "localhost";      // Server database
$user       = "root";           // Username database
$password   = "";               // Password database
$database   = "perpustakaan_digital";   // Nama database

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

