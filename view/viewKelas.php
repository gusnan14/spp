<?php
$datasiswa = 'SELECT * FROM kelas';
$hasil = mysqli_query($koneksi, $datasiswa);
?>
<div class="deskipsi">
    <p class="updt-ptgs">Data Kelas</p>
</div>
<br>
<button class="btn-insert"><a href="#">Tambah Data Angkatan</a></button>
<br>
<table class="table-style">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Kelas</th>
            <th>Nama Kelas</th>
            <th>Kompetensi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        while ($baris = mysqli_fetch_assoc($hasil)) { ?>
        <tr class="active-row">
            <td><?= $no;?></td>
            <td><?php echo $baris['id_kelas'];?></td>
            <td><?php echo $baris['kelas'];?></td>
            <td><?= $baris['kompetensi'];?></td>
            <td class="w-10">
                <a href="#" class="btn-delete"><img src="../asset/icon/trash-solid.svg"></a>
                <a href="#" class="btn-update"><img src="../asset/icon/update-solid.svg"></a>
            </td>
        </tr>
        <?php 
        $no++;
        } 
        ?>
    </tbody>

</table>