<?php
require_once("koneksi.php");

$result = false;

$id_jadwal  = $_POST['id_jadwal'];
$hari       = $_POST['hari'];
$waktu      = $_POST['waktu'];
$kode_ruang = $_POST['kode_ruang'];
$kode_mk    = $_POST['kode_mk']; 
$nik        = $_POST['nik'];     

$query = "UPDATE jadwal SET hari='$hari',waktu='$waktu',kode_ruang='$kode_ruang',kode_mk='$kode_mk',nik='$nik'WHERE id_jadwal='$id_jadwal'";
$result = mysqli_query($conn, $query);

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
    <script>
        if(<?=$result?>) {
            Swal.fire({
            title: "Berhasil!",
            text: "Data Mahasiswa Berhasil Disimpan!",
            icon: "success",
            timer: 2000,
            }).then(() => {
                window.location.href = 'jadwal.php';
            });
        } else {
            Swal.fire({
            title: "Gagal!",
            text: "Data Mahasiswa Gagal Disimpan!",
            icon: "error",
            timer: 2000,
            }).then(() => {
                window.location.href = 'jadwal.php';
            });
        }
    </script>
</body>
</html> 