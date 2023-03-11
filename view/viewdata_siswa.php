<?php
$datasiswa = 'SELECT * FROM siswa JOIN kelas ON kelas.id_kelas = siswa.id_kelas ORDER BY nisn DESC';
$hasil = mysqli_query($koneksi, $datasiswa);
?>

<div class="form-wraper">
    <form class="form-search" method="GET" action="viewTunggaan.php">
        <label class="title">Cari Data Siswa</label>
        <input name="nisn" type="text" class="search-nisn" list="NISN">
        <datalist id="NISN" name="NISN">
            <?php
                // memilih data yang akan tampil
                $dataNISN = 'SELECT * FROM siswa';
                // mengambil data dari dataNISN
                $query = mysqli_query($koneksi, $dataNISN);
                // perulangan data yang tampil
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?= $row['nisn']?>">Pilih Data<?= $row['nama_siswa'] ?></option>
                    <?php }
            ?>
        </datalist>
        <input type="submit" value="   Cari   " class="button-search" >
    </form>
</div>

<br>
    <button class="btn-insert"><a href="dashboard.php?page=insert_siswa">Tambah Data Siswa</a></button>
<br><br>



<table class="table-style">
    <thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        while ($baris = mysqli_fetch_assoc($hasil)) { ?>
        <tr class="active-row">
            <td><?= $no;?></td>
            <td><?= $baris['nisn']; ?></td>
            <td><?= ucwords($baris['nama_siswa']);?></td>
            <td><?= ucwords($baris['kelas']); ?></td>
            <td><?= ucwords($baris['alamat']);?></td>
            <td class="w-10">
                <button class="btn-delete" data-nisn="<?= $baris['nisn']?>"><img src="../asset/icon/trash-solid.svg" onclick="openPopup()"></button>
                <!-- <a href="../delete/deleteSiswa.php?delete_siswa=<?= $baris['nisn']?>&page=siswa" class="btn-delete" onclick="openPopup()"></a> -->
                <a href="../update/updateSiswa.php?update_siswa=<?= $baris['nisn']?>&page=siswa" class="btn-update"><img src="../asset/icon/edit.svg"></a>
            </td>
        </tr>

        <?php 
        $no++;
        } 
        ?>
    </tbody>

</table>
<div class="backround-popup" id="backround-popup">
    <button disabled></button>
</div>
<div class="popup" id="popup">
    <img src="../asset/icon/triangle-exclamation-solid.svg" class="img">
    <h2>Peringatan!</h2>
    <p>Apakah anda yakin menghapus data tersebut?</p>
    <div class="button">
        <a href="" class="btn-ok" id="deleteBtn">Delete</a>
        <button class="btn-close" onclick="closePopup()">Close</button>
    </div>
</div>


<script>
    const btnDelete = document.querySelectorAll(".btn-delete")
    const btnDeleteModal = document.querySelector("#deleteBtn")

    btnDelete.forEach(element => {
        element.addEventListener("click", () => {
            const nisn = element.getAttribute("data-nisn");
            btnDeleteModal.setAttribute("href", "../delete/deleteSiswa.php?delete_siswa="+nisn+"&page=siswa")
        })
    });
</script>