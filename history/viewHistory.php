<?php
    include "../koneksi.php";
    // $dataNisn = $_SESSION['username'];
    $data = "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN petugas USING (id_petugas) WHERE keterangan='Lunas'";
    $hasil = mysqli_query($koneksi, $data);
?>
<form method="get">
    <div class="search" style="margin-left:155px;">
        <span class="search-history">Cari Data</span><br>
        <input type="text" name="cari-data" placeholder="Nisn / Nama" class="insrt">
        <input type="submit" name="cari" value="Cari" class="btn-srcnisn">
    </div>
</form>

<?php
$dataSearch = "SELECT * FROM pembayaran";
if (@$_GET['cari']) {

}
?>


<table class="table-style">
    <thead>
        <tr>
            <td>No</td>
            <td>Nisn</td>
            <td>Nama Siswa</td>
            <td>Kelas</td>
            <td>Bulan</td>
            <td>Nama Petugas</td>
            <td>Keterangan</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            while ($baris = mysqli_fetch_assoc($hasil)) {
        ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $baris['nisn'];?></td>
            <td><?= $baris['nama_siswa'];?></td>
            <td><?= $baris['kelas'];?></td>
            <td><?= $baris['bulan'];?></td>
            <td><?= $baris['nama_petugas'];?></td>
            <td><?= $baris['keterangan'];?></td>
        </tr>

        <?php
        $no++;
        }
        ?>
    </tbody>
</table>