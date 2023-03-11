<?php 
    include "../template/sidebar.php";
    include "../template/navbar.php";
?>

    <div class="main-content">
        <div class="cari-nisn">
            <span class="description">Cari Nisn</span>
            <a href="dashboard.php?page=pembayaran" class="btn-srcnisn">Click Here</a>
        </div>
            <?php
            if (@$_GET['nisn']) {
                $nisn = $_GET['nisn'];
                $view = "SELECT * FROM siswa JOIN kelas on siswa.id_kelas = kelas.id_kelas JOIN spp on siswa.angkatan = spp.angkatan WHERE nisn='$nisn'";
                $query2 = mysqli_query($koneksi, $view);
                $row2 = mysqli_fetch_assoc($query2);
            ?>
            <!-- <form action="" id="form-biodata" class="w-50"> -->
                <table class="table-style tampil">
                    <tr>
                        <th>Nama Siswa</th>
                        <td><?= $row2['nama_siswa']?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td><?= $row2['kelas']?></td>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <td><?= $row2['angkatan']?></td>
                    </tr>
                </table>
            <!-- </form> -->
        <?php
                }
            ?>

    <br><br>

        <!-- view tunggakan -->

        <?php
        if (@$_GET['nisn']) {
            ?>
            <!-- <form action=""> -->
                <table class="table-style">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tanggal Bayar</th>
                            <th>Id Pembayaran</th>
                            <th>Jumlah Bayar</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $nomor = 1;
                            $data_pembayaran ="SELECT * FROM pembayaran WHERE nisn = '$nisn'";
                            $tampil_pembayaran = mysqli_query($koneksi, $data_pembayaran);
                            $total = mysqli_num_rows($tampil_pembayaran);
                            $jumlah_bayar = "SELECT * FROM spp";
                            
                            $halaman = 6;
                            
                            $page = isset($_GET['halaman']) ? (int)$_GET['halaman']: 1;
                            $mulai = ($page > 1) ? ($page * $halaman)-$halaman : 0;

                            $no = $mulai+1;
                            $query_pembayaran = "SELECT * FROM pembayaran WHERE nisn='$nisn'";
                            $hasil_pembayaran = mysqli_query($koneksi, $query_pembayaran);
                        
                            $total = mysqli_num_rows($hasil_pembayaran);
                            $pages = ceil($total/$halaman);

                            $pagination = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE nisn='$nisn' LIMIT $mulai, $halaman ");

                            while ($row_pembayaran = mysqli_fetch_assoc($pagination)) { 
                        ?>
                            
                        <tr>
                            <td><?= $nomor;?></td>
                            <td><?= $row_pembayaran['bulan'];?></td>
                            <td><?= $row_pembayaran['tanggal_bayar'];?></td>
                            <td><?= $row_pembayaran['id_pembayaran'];?></td>
                            <td><?= $row2['jumlah_pembayaran'];?></td>
                            <td><?= $row_pembayaran['keterangan'];?></td>
                            <td>
                                <?php
                                    if ($row_pembayaran['keterangan'] === 'Lunas') {
                                ?>
                                        <button disabled class="btn-lunas">Selesai</button>
                                <?php        
                                    } else {
                                ?>
                                        <a href="../proses/prosesBayar.php?nisn=<?=$nisn?>&id_pembayaran=<?=$row_pembayaran['id_pembayaran'];?>" class="btn-bayar">Bayar</a>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $nomor++;
                            } 
                        ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <span>Pilih Semester</span>
                    <?php
                    for ($i=1; $i <= $pages; $i++) { 
                    ?>
                    <a href="viewTunggaan.php?nisn=<?=$nisn?>&halaman=<?=$i?>">
                        <u class="<?php if (@$_GET['halaman']==$i) {
                            echo 'active';
                        } ?>"><?= $i;?></u>
                    </a>
                    <?php
                    }
                    ?>
                </div>
            </form>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<!-- connect javascript -->
<script src="../js/script.js"></script>
</body>
</html>


