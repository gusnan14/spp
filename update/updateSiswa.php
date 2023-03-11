<?php
    include "../koneksi.php";
    $nisnsiswa = $_GET['update_siswa'];
    $data = mysqli_query($koneksi, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='$nisnsiswa'");
    $hasil = mysqli_fetch_assoc($data);
    include "../template/sidebar.php";
?>
<body>
<div class="main-content">
    <div class="deskipsi">
        <p class="updt-ptgs">Form Update Data Siswa</p>
    </div>
    <form action="" method="POST">
        <table class="table-style">
            <tr>
                <th>NISN</th>
                <td>
                    <input type="text" name="nisn" class="insrt" readonly value="<?= $hasil['nisn'];?>">
                </td>
            </tr>
            <tr>
                <th>Nama Siswa</th>
                <td><input type="text" name="nama_siswa" class="insrt" value="<?= $hasil['nama_siswa'];?>"></td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>
                    <select name="kelas" class="select-box">
                        <option>Pilih Kelas</option>
                        <?php
                            $idkelas = $hasil['id_kelas'];
                            $kelasSelected = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas = $idkelas "); 
                            $kelas = mysqli_fetch_assoc($kelasSelected);
                            ?>
                                <option selected value="<?php echo $kelas['id_kelas'];?>"><?php echo $kelas['kelas'];?></option>
                            <?php
                            $data_kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas !=$idkelas");
                            while ($row = mysqli_fetch_assoc($data_kelas)) {
                            ?>
                                <option value="<?php echo $row['id_kelas'];?>"><?php echo $row['kelas'];?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><input type="text" name="alamat" class="insrt" value="<?= $hasil['alamat']; ?>"></td>
            </tr>
            <tr hidden>
                <th>angkatan</th>
                <td><input type="text" name="angkatan" class="insrt" value="<?= $hasil['angkatan']; ?>"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="text" name="password" class="insrt" autocomplete="off" value="<?= $hasil['password'];?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="kirim" value="update" class="btn-updt"></input></td>
            </tr>
        </table>
    </form>
</div>

<?php
if (@$_POST['kirim']) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $akt = $_POST['angkatan'];
    $pw = $_POST['password'];

    $query_update = mysqli_query($koneksi, "UPDATE siswa SET nama_siswa='$nama',alamat='$alamat', id_kelas='$kelas', password='$pw' WHERE nisn='$nisn'");

    if (!$query_update) {
        die('Data Gagal Di Update')."".mysqli_error($koneksi);
    } else {
        echo "<script>alert('Data Berhasil Di Update!!');window.location='../view/dashboard.php?page=siswa';</script>";
    }

}


?>