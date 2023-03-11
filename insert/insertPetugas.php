<form action="" method="post">
    <div class="deskipsi">
        <p class="updt-ptgs">Form Tambah Data Petugas</p>        
    </div>
    <table class="table-style">
        <tr>
            <th>Id Petugas</th>
            <td><input type="text" name="id_petugas" class="insrt"></td>
        </tr>
        <tr>
            <th>Nama Petugas</th>
            <td><input type="text" name="nama_petugas" class="insrt"></td>
        </tr>
        <tr>
            <th>Level Petugas</th>
            <td>
                <select name="level_petugas" class="select-box">
                    <option>Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Username</th>
            <td><input type="text" name="username" class="insrt"></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="text" name="password" class="insrt"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="save" class="btn-updt"></td>
        </tr>
    </table>
</form>

<?php
if (@$_POST['save']) {
    $id = $_POST['id_petugas'];
    $nama = $_POST['nama_petugas'];
    $level = $_POST['level_petugas'];
    $username = $_POST['username'];
    $pw = $_POST['password'];

    $tambah_data = "INSERT INTO petugas (id_petugas, nama_petugas, level_petugas, username, password) VALUES ('$id', '$nama', '$level', '$username', '$pw')";
    $pos = mysqli_query($koneksi, $tambah_data);
    
    if (!$pos ) {
        echo "<script>alert('Data Gagal Di Tambahkan')</script>";
    } else{
        echo "<script>alert('Data Berhasil Di Tambahkan');window.location='../view/dashboard.php?page=petugas';</script>";
    }

}
?>