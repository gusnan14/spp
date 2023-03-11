<?php
    include "../koneksi.php";

    $nisn = $_GET['delete_siswa'];

    $hapusSiswa = "DELETE FROM siswa WHERE nisn='$nisn'";
    $hapusPembayaran = "DELETE FROM pembayaran WHERE nisn=$nisn";
    $hasil = mysqli_query($koneksi, $hapusSiswa);


    if (!$hasil) {
        die ("Data gagal dihapus " . mysqli_error($koneksi));
    } else {
        mysqli_query($koneksi, $hapusPembayaran);
        echo "<script>
        window.location='../view/dashboard.php?page=siswa';
        </script>";  
    }
?>