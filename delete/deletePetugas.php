<?php
    include "../koneksi.php";

    $id = $_GET['delete_petugas'];

    $hapus = "DELETE FROM petugas WHERE id_petugas='$id'";
    $hasil = mysqli_query($koneksi, $hapus);


    if (!$hasil) {
        die ("Data gagal dihapus " . mysqli_error($koneksi));
    } else {
        echo "<script>
        window.location='../view/dashboard.php?page=petugas';
        </script>";    
    }
?>