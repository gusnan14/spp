<?php
$datasiswa = 'SELECT * FROM spp';
$hasil = mysqli_query($koneksi, $datasiswa);
?>
<div class="deskipsi">
    <p class="updt-ptgs">Data Spp</p>
</div>
<br>
<button class="btn-insert"><a href="dashboard.php?page=insert_spp">Tambah Data Angkatan</a></button>
<br>
<table class="table-style">
    <thead>
        <tr>
            <th>No</th>
            <th>Angkatan</th>
            <th>Jumlah pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        while ($baris = mysqli_fetch_assoc($hasil)) { ?>
        <tr class="active-row">
            <td><?= $no;?></td>
            <td><?php echo $baris['angkatan']; ?></td>
            <td><?php echo $baris['jumlah_pembayaran']; ?></td>
            <td class="w-10">
                <a href="#" class="btn-delete"><img src="../asset/icon/trash-solid.svg"></a>
                <a href="#" class="btn-update"><img src="../asset/icon/update-solid.svg" alt=""></a>
            </td>
        </tr>
        <?php 
        $no++;
        } 
        ?>
    </tbody>

</table>