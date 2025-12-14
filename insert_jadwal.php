<?php
// Memuat file koneksi database
include 'koneksi.php';

extract($_POST); //<-- $hari, $waktu, $mata_kuliah, $dosen dan $ruang
$SQL = "INSERT INTO jadwal(hari, waktu, kode_mk, nik, kode_ruang) VALUES('$hari','$waktu','$mata_kuliah','$dosen','$ruang')";

// Eksekusi query
if ($conn->query($SQL) === TRUE) {
    // Jika berhasil, redirect ke jadwal.php
    header("location:jadwal.php");
} else {
    // Jika gagal, tampilkan error
    echo "Error: " . $SQL . "<br>" . $conn->error;
}

// Tutup koneksi
$con->close();
?>