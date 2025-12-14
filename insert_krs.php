<?php
// Memuat file koneksi database
include 'koneksi.php';

// Mengekstrak data dari POST: $jadwal (array id_jadwal), $nim
extract($_POST);

// Loop untuk setiap jadwal yang dipilih
foreach ($jadwal as $id_jadwal) {
    // Ambil data jadwal berdasarkan id
    $sql_jadwal = "SELECT kode_mk, nik, kode_ruang FROM jadwal WHERE id_jadwal = '$id_jadwal'";
    $result = $conn->query($sql_jadwal);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kode_mk = $row['kode_mk'];
        $nik = $row['nik'];
        $kode_ruang = $row['kode_ruang'];

        // Insert ke tabel krs
        $SQL = "INSERT INTO krs(nim, kode_mk, nik, kode_ruang) VALUES('$nim','$kode_mk','$nik','$kode_ruang')";
        if ($conn->query($SQL) !== TRUE) {
            echo "Error inserting KRS: " . $conn->error;
        }
    }
}

// Jika berhasil, redirect ke halaman mahasiswa atau konfirmasi
header("location:tampil_mahasiswa.php");
?>