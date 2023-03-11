<?php
include ("../koneksi.php");
session_start();
$pathAwal = "http://localhost/UK/";
if(!isset($_GET['page'])) {

}
else{
    $active = $_GET['page'];

}

// $uri_path = parse_url($_SERVER['REQUEST_URL'], PHP_URL_PATH);
// $uri_segments = explode('/', $uri_path);

// if ($uri_segments['3'] == 'viewTunggaan.php') {
//     echo ;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- connect css -->
    <link rel="stylesheet" href="../asset/css/style.css">
    <script src="../asset/js/script.js"></script>
    <title>Pembayaran SPP</title>
    <!-- Logo Di Title -->
    <link rel="icon" href="../asset/icon/logo.svg">
    <!-- Link Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="sidebar" id="sidebar">
            <div class="header">
                <div class="list-item margin-bottom-5">
                    <img src="../asset/icon/pembayaran-spp.svg" class="icon-header">
                    <span class="description-header">PEMBAYARAN SPP</span>
                </div>
                    <?php
                    if (@$_SESSION['level_petugas']=='admin') {
                        ?>
                    <div class="main">
                        <!-- <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=dashboard" class="<?php if($active == 'dashboard') echo "aktif" ?>">
                                <img src="../asset/icon/dashboard.svg" alt="" class="icon"> 
                                <span class="description">Dashboard</span>
                            </a>
                        </div> -->
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=siswa" class="<?php if($active == 'siswa') echo "aktif" ?>">
                                <img src="../asset/icon/toga.svg" alt="" class="icon"> 
                                <span class="description">Data Siswa</span>
                            </a>
                        </div>
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=petugas" class="<?php if($active == 'petugas') echo "aktif" ?>">
                                <img src="../asset/icon/dtpet.svg" alt="" class="icon"> 
                                <span class="description">Data Petugas</span>
                            </a>
                        </div>
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=spp" class="<?php if($active == 'spp') echo "aktif" ?>">
                                <img src="../asset/icon/dtspp.svg" alt="" class="icon"> 
                                <span class="description">Data Spp</span>
                            </a>
                        </div>
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=kelas" class="<?php if($active == 'kelas') echo "aktif" ?>">
                                <img src="../asset/icon/kelas.png" alt="" class="icon"> 
                                <span class="description">Data Kelas</span>
                            </a>
                        </div>
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=pembayaran" class="<?php if($active == 'pembayaran') echo "aktif" ?>">
                                <img src="../asset/icon/pembayaran.svg" alt="" class="icon"> 
                                <span class="description">Pembayaran</span>
                            </a>
                        </div>
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=laporan" class="<?php if($active == 'laporan') echo "aktif" ?>">
                                <img src="../asset/icon/laporan.svg" alt="" class="icon"> 
                                <span class="description">Laporan</span>
                            </a>
                        </div>
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=history" class="<?php if($active == 'history') echo "aktif" ?>">
                                <img src="../asset/icon/histori.svg" alt="" class="icon"> 
                                <span class="description">Histori</span>
                            </a>
                        </div>
                        <!-- <div class="logout">
                            <a href="<?=$pathAwal?>logout.php">
                                <img src="../asset/icon/logout.svg" alt="" class="icon"> 
                                <span class="description-logout">Keluar</span>
                            </a>
                        </div> -->
                    </div>
                    <?php
                    }elseif (@$_SESSION['level_petugas']=='petugas') {
                        ?>
                    <div class="main">
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=pembayaran" class="<?php if($active == 'pembayaran') echo "aktif" ?>">
                                <img src="../asset/icon/pembayaran.svg" alt="" class="icon"> 
                                <span class="description">Pembayaran</span>
                            </a>
                        </div>
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>view/dashboard.php?page=history" class="<?php if($active == 'history') echo "aktif" ?>">
                                <img src="../asset/icon/histori.svg" alt="" class="icon"> 
                                <span class="description">History</span>
                            </a>
                        </div>
                        <!-- <div class="logout">
                            <a href="<?=$pathAwal?>logout.php">
                                <img src="../asset/icon/logout.svg" alt="" class="icon"> 
                                <span class="description-logout">Logout</span>
                            </a>
                        </div> -->
                    </div>
                        <?php
                    } elseif(@$_SESSION['level_petugas']=='siswa') {
                        ?>
                    <div class="main">
                        <div class="list-item margin-bottom-1">
                            <a href="<?=$pathAwal?>dashboard.php?page=history" class="<?php if($active == 'history') echo "aktif" ?>">
                                <img src="../asset/icon/histori.svg" alt="" class="icon"> 
                                <span class="description">History</span>
                            </a>
                        </div>
                        <!-- <div class="logout">
                            <a href="<?=$pathAwal?>logout.php">
                                <img src="../asset/icon/logout.svg" alt="" class="icon"> 
                                <span class="description-logout">Logout</span>
                            </a>
                        </div> -->
                    </div>
                    <?php
                    }
                    ?>
            </div>
        </div>
<!-- </div> -->
