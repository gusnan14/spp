<form method="post">
    <div class="deskipsi">
        <p class="updt-ptgs">Form Tambah Data Siswa</p>
    </div>
<br>    
    <table class="table-style">
        <tr>
            <th>Masukkan Nama</th>
            <td><input type="text" name="nama" class="insrt"></td>
        </tr>
        <tr>
            <th>Masukkan Nisn</th>
            <td><input type="text" name="nisn" class="insrt"></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><input type="text" name="alamat" class="insrt"></td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>
                <select name="kelas" id="" class="select-box">
                    <option value="">Pilih Kelas</option>
                    <?php
                        $data_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
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
            <th>Angkatan</th>
            <td>
                <select name="angkatan" class="select-box">
                    <option value="">Pilih Angkatan</option>
                    <?php
                       $data_angkatan = mysqli_query($koneksi, "SELECT * FROM spp");
                       while ($row_akt = mysqli_fetch_assoc($data_angkatan)) {
                        ?>
                            <option value="<?= $row_akt['angkatan'];?>"><?= $row_akt['angkatan']?></option>
                        <?php
                       } 
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan=2><input type="submit" name="save" value="Simpan" class="btn-updt"></td>
        </tr>
    </table>
</form>

<?php
// tombol submit
if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];
    $password = 'smkti';
    $keterangan ='Belum Lunas';
    $insert = "INSERT INTO siswa (nisn, nama_siswa, alamat, id_kelas, angkatan, password) VALUES ('$nisn', '$nama', '$alamat', '$kelas', '$angkatan', '$password')";
    $pos = mysqli_query($koneksi, $insert);

    // id_petugas
    $id_petugas = $_SESSION['id_petugas'];

    $awalTempo = date($angkatan.'-07-d');
    $bulanIndo = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];

    for ($i=0; $i < 36; $i++){
        $jatuhtempo = date("Y-m-d",strtotime("+$i month", strtotime($awalTempo)));
        
        $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]." ".date('Y', strtotime($jatuhtempo));

        $pembayaran = "INSERT INTO pembayaran (id_pembayaran, tanggal_bayar, bulan, nisn, id_petugas, keterangan) VALUES (NULL, NULL, '$bulan', '$nisn', NULL,'$keterangan')";
        mysqli_query($koneksi, $pembayaran);
    }

    if (!$pos ) {
        echo "<script>alert('Data Gagal Di Tambahkan')</script>";
    } else{
        echo "<script>alert('Data Berhasil Di Tambahkan');window.location='../view/dashboard.php?page=siswa';</script>";
    }
}
?>