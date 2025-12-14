<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
        $conn = new mysqli("localhost","root","","siamu");
    ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg" style="width: 500px;">
        <div class="card-header p-0 bg-primary">
            <h5 class="text-white text-center py-2 rounded">Tambah Jadwal Kuliah</h5>
        </div>
        <div class="card-body">
             <form action="insert_jadwal.php" method="post">
                <table class="mt-2" cellpadding="3" style="width: 100%;">
                    <tr><td>Hari</td></tr><tr><td>
                        <select name="hari" class="form-select">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <h3></h3>
                        </select>
                    </td></tr>
                    <tr><td>Waktu</td></tr><tr><td>
                    <select name="waktu" class="form-select">
                        <option value="07.30 - 10.20">07.30 - 10.20</option>
                        <option value="10.30 - 13.20">10.30 - 13.20</option>
                        <option value="13.30 - 16.20">13.30 - 16.20</option>
                        <option value="16.30 - 19.20">16.30 - 19.20</option>
                    </select>
                    </td></tr>
                    <tr><td>Mata Kuliah</td></tr><tr><td>
                        <select name="mata_kuliah" class="form-select">
                            <?php
                                $mata_kuliah = $conn->query("SELECT * FROM mata_kuliah");
                                while($brs = $mata_kuliah->fetch_assoc()){
                                    echo "<option value='".$brs['kode_mk']."'>".$brs['nama_mk']."</option>";
                                }
                            ?>
                        </select>
                    </td></tr>
                    <tr><td>Dosen</td></tr><tr><td>
                        <select name="dosen" class="form-select">
                            <?php
                                $dosen = $conn->query("SELECT * FROM dosen");
                                while($brs = $dosen->fetch_assoc()){
                                    echo "<option value='".$brs['nik']."'>".$brs['nama']."</option>";
                                }
                            ?>
                        </select>
                    </td></tr>
                    <tr><td>Ruang</td></tr><tr><td>
                        <select name="ruang" class="form-select">
                            <?php
                                $ruang = $conn->query("SELECT * FROM ruang");
                                while($brs = $ruang->fetch_assoc()){
                                    echo "<option value='".$brs['kode_ruang']."'>".$brs['nama_ruang']."</option>";
                                }
                            ?>
                        </select>
                    </td></tr>
                <tr>
                    <th colspan="2">
                        <div class="d-flex gap-2 mt-4 justify-content-center align-items-center">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button class="btn btn-warning" onclick="goBack()">Kembali</button>
                        </div>
                    </th>
                </tr>
                </table>
            </form>
        </div>
    </div>
    </div>
    <script>
        function goBack() {
            window.history.back('jadwal.php');
        }
    </script>
</body>
</html>