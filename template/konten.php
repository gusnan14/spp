<div class="main-content">
    <?php switch (@$_GET['page']) {
        // view
        case 'siswa':
            include 'viewdata_siswa.php';
            break;
        case 'insert_siswa':
            include '../insert/insertSiswa.php';
            break;

        case 'petugas':
            include 'viewPetugas.php';
            break;    
        case 'insert_petugas':
            include '../insert/insertPetugas.php';
            break;
        case 'pembayaran':
            include 'viewpembayaran.php';
            break;
        case 'spp': 
            include 'viewSpp.php';
            break;
        case 'insert_spp':
            include '../insert/insertSpp.php';
            break;
        case 'kelas':
            include 'viewKelas.php';
            break;
        case 'laporan':
            include 'viewLaporan.php';
            break;
        // history
        case 'history':
            include '../history/viewHistory.php';
            break;
        // proses
        case 'proses_bayar':
            include '../proses/prosesBayar.php';
            break;

        // Delete
        if (@$_GET['delete_petugas']) {
            include "../delete/deletePetugas.php";
        } elseif (@$_GET['delete_siswa']) {
            include "../delete/deleteSiswa.php";
        }

        // Update
        if (@$_GET['update_petugas']) {
            include "../update/updatePetugas.php";
        }elseif (@$_GET['update_siswa']) {
            include "../update/updateSiswa.php";
        }
        
        // default:
        // include 'dashboard.php';
    } ?>
    
</div>