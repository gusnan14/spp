<form action="" method="post">
<div class="deskipsi">
        <p class="updt-ptgs">Tambah Data Spp</p>
    </div>
<br>
<table class="table-style">
    <tr></tr>
    <?php
        $aktPlus = mysqli_query($koneksi, "SELECT angkatan FROM spp ORDER BY angkatan DESC LIMIT 1");
        $aktHasil = mysqli_fetch_assoc($aktPlus);
    ?>
    <tr>
        <th>Angkatan</th>
        <td><input type="text" name="angkatan" value="<?= $aktHasil['angkatan'] + 1?>" class="insrt" autocomplete="off"></td>
    </tr>    
    <tr>
        <th>Jumlah Spp</th>
        <td><input type="text" name="spp" class="insrt" autocomplete="off"></td>
    </tr>
    <tr>
        <td colspan=2><input type="submit" name="save" value="Simpan" class="btn-updt"></td>
    </tr>
</table>
</form>

<?php
if (@ $_POST['save']) {
    $akt = $_POST['angkatan'];
    $jumlah = $_POST['spp'];

    $insert = mysqli_query($koneksi, "INSERT INTO spp (angkatan, jumlah_pembayaran) VALUES ('$akt', '$jumlah')");

    if (!$insert) {
        echo "<script>alert('Data Gagal Di Tambahkan')</script>";
    } else {
        echo "<script>alert('Data Berhasil Di Tambahkan');window.location='../view/dashboard.php?page=spp';</script>";
    }
}
?>