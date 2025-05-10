<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa Berprestasi</title>
</head>
<body>
    <h2>Ubah Data</h2>
    <?php
    include "koneksi.php";

    $id_mahasiswa = $_GET['id'];

    //kode simpan

    if(isset($_POST['nama'])){
        $nama           = $_POST['nama'];
        $email          = $_POST['email'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $alamat         = $_POST['alamat'];
        
        if($nama == "" || $email == "" || $jenis_kelamin == "" || $alamat == ""){
            echo '<script>alert("Semua data harus diisi!.")</script>';
        }else{

            $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', email='$email', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE id='$id_mahasiswa'");

            if($query){
                echo '<script>alert("Ubah data berhasil")</script>';
            }else{
                echo '<script>alert("Ubah data gagal")</script>';
            }
        }

    }

    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id_mahasiswa'"); 
    $data = mysqli_fetch_array($query);
    ?>
    <form method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama'];  ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $data['email']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                   <select name="jenis_kelamin">
                    <option value="Laki-laki" <?php if(isset($data['jenis_kelamin']) && $data['jenis_kelamin']=="Laki-laki") echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if(isset($data['jenis_kelamin']) && $data['jenis_kelamin']=="Perempuan") echo 'selected'; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat"><?php echo $data['alamat'];  ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Simpan</button>
                    <button type="reset">Reset</button>
                    <a href="index.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>