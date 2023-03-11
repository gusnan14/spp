<?php 
$nisn = @$_GET['nisn'];
?>
<div class="">
    <div class="form-wraper">
        <form action="viewTunggaan.php" method="GET" class="form-search fixed">
            <label class="title">Cari Data Siswa</label>
            <div class="input-field-search">
                <label>Masukkan Nisn</label>
                <input type="text" autocomplete="off" name="nisn" list="NISN" class="search-nisn">
            </div>
            <datalist id="NISN" name="NISN">
                <?php
                // memilih data yang akan tampil
                $dataNISN = 'SELECT * FROM siswa';
                // mengambil data dari dataNISN
                $query = mysqli_query($koneksi, $dataNISN);
                // perulangan data yang tampil
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?= $row['nisn']?>">Pilih Data <?= $row['nama_siswa'] ?></option>
                    <?php }
                ?>
            </datalist>
            <!-- avtive page -->
            <input type="hidden" name="page" value="pembayaran">
            <!-- button search -->
            <input type="submit" value="   Cari   " class="button-search">
        <!-- </form> -->
    </div>
    <br>
    <br>
</div>