<?php
// Memuat file koneksi database
include 'koneksi.php';

// Cek apakah id_jadwal ada di URL
if (!isset($_GET['id_jadwal'])) {
    die("ID jadwal tidak ditemukan");
}

$id_jadwal = $_GET['id_jadwal'];

// Query untuk menghapus jadwal
$SQL = "DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'";

// Eksekusi query
if ($conn->query($SQL) === TRUE) {
    // Jika berhasil, redirect ke jadwal.php
    header("Location: jadwal.php");
    exit;
} else {
    // Jika gagal, tampilkan error
    echo "Error: " . $SQL . "<br>" . $conn->error;
}

// Tutup koneksi
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
    rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
</body>
</html>
<script>
    Swal.fire({
    title: "Berhasil!",
    text: "Data Mahasiswa Berhasil Dihapus!",
    icon: "success",
    timer: 2000,
    }).then(() => {
        window.location.href = 'jadwal.php';
    });
</script>