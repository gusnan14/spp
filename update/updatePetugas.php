<?php
    include "../koneksi.php";
    $idpetugas = $_GET['update_petugas'];
    $data = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$idpetugas'");
    $hasil = mysqli_fetch_assoc($data);
    include "../template/sidebar.php";
?>
<body>
<div class="main-content">
    <div class="deskipsi">
        <p class="updt-ptgs">Form Update Data Petugas</p>
    </div>
    <form action="" method="POST">
        <table class="table-style">
            <tr>
                <th>Id Petugas</th>
                <td>
                    <input type="text" name="id_petugas" class="insrt" readonly value="<?= $hasil['id_petugas'];?>">
                </td>
            </tr>
            <tr>
                <th>Nama Petugas</th>
                <td><input type="text" name="nama_petugas" class="insrt" value="<?= $hasil['nama_petugas']; ?>"></td>
            </tr>
            <tr>
                <th>Level</th>
                <td>
                    <select name="level" class="select-box">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Username</th>
                <td><input type="username" name="username" class="insrt" value="<?= $hasil['username']; ?>"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="text" name="password" class="insrt" autocomplete="off" value="<?= $hasil['password'];?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="kirim" value="update" class="btn-updt"></input></td>
            </tr>
        </table>
    </form>
</div>

<?php
if (@$_POST['kirim']) {
    $id = $_POST['id_petugas'];
    $nama = $_POST['nama_petugas'];
    $level = $_POST['level'];
    $username = $_POST['username'];
    $pw = $_POST['password'];

    $query_update = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama', level_petugas='$level', username='$username', password='$pw' WHERE id_petugas='$id'");

    if (!$query_update) {
        die('Data Gagal Di Update')."".mysqli_error($koneksi);
    } else {
        echo "<script>alert('Data Berhasil Di Update!!');window.location='../view/dashboard.php?page=petugas';</script>";
    }

}


?>