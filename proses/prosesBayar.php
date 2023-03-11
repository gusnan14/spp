<?php 
include "../template/sidebar.php";
?>
    <div class="main-content">
        <div class="form-wraper">
        <form action="" method="post">
                <?php
                    $nisn = $_GET['nisn'];
                    $id = $_GET['id_pembayaran'];
                    $data = mysqli_query($koneksi, "SELECT * FROM pembayaran JOIN siswa USING(nisn) JOIN spp USING(angkatan) WHERE id_pembayaran = $id ");
                    $tampil = mysqli_fetch_assoc($data);
                ?>
                
                <table class="table-style-byr">
                    <thead>
                        <tr> 
                            <td colspan="2" >Form Pembayaran SPP</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bulan</td>
                            <td><?= $tampil['bulan'];?></td>
                        </tr>
                        <tr>
                            <td>Total Bayar</td>
                            <td><?= $tampil['jumlah_pembayaran']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Bayar</td>
                            <td><input type="date" name="tanggal"></td>
                        </tr>
                        <!-- <tr hidden>
                            <td>Keterangan</td>
                            <td><input type="text" name="keterangan" value="<?=$tampil['keterangan'];?>"></td>
                        </tr> -->
                        <tr>
                            <td colspan="2"><input type="submit" name="bayar" value="Bayar" class="button-search"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <?php

                if (@$_POST['bayar']) {
                    $tanggal = $_POST['tanggal'];
                    $idPetugas = $_SESSION['id_petugas'];
                    $keterangan = 'Lunas';

                    $update = "UPDATE pembayaran SET tanggal_bayar='$tanggal', keterangan='$keterangan', id_petugas = '$idPetugas'  WHERE id_pembayaran='$id'";
                    $query_update = mysqli_query($koneksi, $update);

                    if (!$query_update) {
                        die("Data Pembayaran Gagal Di Perbarui" . mysqli_error($koneksi));
                    } else {
                        echo "<script>alert('Data Pembayaran Berhasil Di Perbarui'); window.location='../view/viewTunggaan.php?nisn=$nisn'</script>";
                    }
                }
            ?>            
            
    </div>
   <!-- connect javascript -->
   <script src="../js/script.js"></script>
</body>
</html>