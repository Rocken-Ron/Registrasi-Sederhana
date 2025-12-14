<?php
require_once("koneksi.php");

$id_jadwal = $_GET['id_jadwal'];
$sql = $conn->query("SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'");
$r = $sql->fetch_assoc();
extract($r);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Form Edit Jadwal Kuliah</h4>
                </div>

                <div class="card-body">
                    <form action="update_jadwal.php" method="post">

                        <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">

                        <!-- Hari -->
                        <div class="mb-3">
                            <label class="form-label">Hari</label>
                            <select name="hari" class="form-select" required>
                                <?php
                                $hari_list = ['Senin','Selasa','Rabu','Kamis','Jumat'];
                                foreach ($hari_list as $h) {
                                    $selected = ($hari == $h) ? "selected" : "";
                                    echo "<option $selected>$h</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Waktu -->
                        <div class="mb-3">
                            <label class="form-label">Waktu</label>
                            <select name="waktu" class="form-select" required>
                                <?php
                                $waktu_list = ['07.30 - 10.20','10.30 - 13.20','13.30 - 16.20','16.30 - 19.20'];
                                foreach ($waktu_list as $w) {
                                    $selected = ($waktu == $w) ? "selected" : "";
                                    echo "<option $selected>$w</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Mata Kuliah -->
                        <div class="mb-3">
                            <label class="form-label">Mata Kuliah</label>
                            <select name="kode_mk" class="form-select" required>
                                <?php
                                $mk = $conn->query("SELECT * FROM mata_kuliah");
                                while ($m = $mk->fetch_assoc()) {
                                    $selected = ($kode_mk == $m['kode_mk']) ? "selected" : "";
                                    echo "<option value='$m[kode_mk]' $selected>$m[nama_mk]</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Dosen -->
                        <div class="mb-3">
                            <label class="form-label">Dosen</label>
                            <select name="nik" class="form-select" required>
                                <?php
                                $dsn = $conn->query("SELECT * FROM dosen");
                                while ($d = $dsn->fetch_assoc()) {
                                    $selected = ($nik == $d['nik']) ? "selected" : "";
                                    echo "<option value='$d[nik]' $selected>$d[nama]</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Ruang -->
                        <div class="mb-3">
                            <label class="form-label">Ruang</label>
                            <select name="kode_ruang" class="form-select" required>
                                <?php
                                $rg = $conn->query("SELECT * FROM ruang");
                                while ($ruang = $rg->fetch_assoc()) {
                                    $selected = ($kode_ruang == $ruang['kode_ruang']) ? "selected" : "";
                                    echo "<option value='$ruang[kode_ruang]' $selected>$ruang[nama_ruang]</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Button -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="jadwal.php" class="btn btn-secondary">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

 <!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function konfirmasiSimpan() {
    Swal.fire({
        title: 'Simpan Perubahan?',
        text: 'Pastikan data jadwal sudah benar.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Simpan',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.querySelector("form").submit();
        }
    });
}
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
