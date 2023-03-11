<?php
session_start();
include("koneksi.php");

// post username & pass dari form login
$username = $_POST['username'];
$pass = $_POST['password'];

// mengambil data dari database
$queryAdmin = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$pass' AND level_petugas='admin'" ) or die(mysqli_error($koneksi));

$queryPetugas = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$pass' AND level_petugas='petugas'" ) or die(mysqli_error($koneksi));

$querySiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$username' AND password='$pass'" ) or die(mysqli_error($koneksi));


if (mysqli_num_rows($queryAdmin) > 0) { //cek jika ada data admin
    $data = mysqli_fetch_assoc($queryAdmin);
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level_petugas'] = $data['level_petugas'];

    $_SESSION['isLogin'] = 1;
    echo "<script>window.location ='view/dashboard.php?page=siswa'</script>";

    // echo "<script>alert('Berhasil Login');window.location ='view/dashboard.php?page=dashboard';</script>";
}elseif (mysqli_num_rows($queryPetugas) > 0) {  //cek jika ada data petugas
    $data = mysqli_fetch_assoc($queryPetugas);
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level_petugas'] = $data['level_petugas'];

    $_SESSION['isLogin'] = 1;
    echo "<script>window.location ='view/dashboard.php?page=pembayaran'</script>";
    // echo "<script>alert('Berhasil Login');window.location ='view/dashboard.php?page=pembayaran';</script>";
}elseif (mysqli_num_rows($querySiswa) > 0) { //cek jika ada data siswa
    $data = mysqli_fetch_assoc($querySiswa);
    $_SESSION['username'] = $data['nisn'];
    $_SESSION['level_petugas'] = 'siswa';

    $_SESSION['isLogin'] = 1;
    echo "<script>window.location ='view/dashboard.php?page=history'</script>";
    // echo "<script>alert('Berhasil Login');window.location ='view/dashboard.php?page=history';</script>";
}else { //jika gagal login
    echo "<script>alert('Gagal Login');window.location ='login.php';</script>";
}
?>

