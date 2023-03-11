<?php
$dataPetugas = "SELECT * FROM petugas";
$hasil = mysqli_query($koneksi, $dataPetugas);
?>
<div>
<div class="deskipsi">
    <p class="updt-ptgs">Data Petugas</p>
</div>
<button class="btn-insert"><a href="dashboard.php?page=insert_petugas">Tambah Data Petugas</a></button>
    <table class="table-style">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Petugas</th>
                <th>Nama Petugas</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while($baris = mysqli_fetch_assoc($hasil)){ 
                ?>

            <tr class="active-row">
                <td><?=$no;?></td>
                <td><?= $baris['id_petugas']; ?></td>
                <td><?= $baris['nama_petugas']; ?></td>
                <td><?= $baris['level_petugas']; ?></td>
                <td class="w-10">
                <?php
                    $id_petugas = $baris['id_petugas'];
                    // $id_petugas = $_SESSION['id_petugas'];
                    $data = "SELECT id_petugas FROM petugas INNER JOIN pembayaran USING (id_petugas) WHERE id_petugas='$id_petugas'";
                    $query = mysqli_query($koneksi, $data);
                    $hasilDelete = mysqli_num_rows($query);

                    if ($hasilDelete == 0) {
                ?>
                        <button class="btn-delete" data-id="<?= $baris['id_petugas']?>"><img src="../asset/icon/trash-solid.svg" onclick="openPopup()"></button>
                        <!-- <a href="../delete/deletePetugas.php?delete_petugas=<?php echo $baris['id_petugas'];?>&page=petugas" onclick="openPopup()" class="btn-delete"><img src="../asset/icon/trash-solid.svg"></a> -->
                <?php    
                    } else {
                        ?>
                        <button disabled></button>
                        <?php
                    }
                ?>
                    
                    <a href="../update/updatePetugas.php?update_petugas=<?php echo $baris['id_petugas']?>&page=petugas" class="btn-update"><img src="../asset/icon/edit.svg" alt=""></a>
                </td>
            </tr>

            <?php
            $no++;
            }
                ?>
        </tbody>
    </table>
</div>
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
            const idpetugas = element.getAttribute("data-id");
            btnDeleteModal.setAttribute("href", "../delete/deletePetugas.php?delete_petugas="+idpetugas+"&page=petugas")
        })
    });
</script>

