<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa Berprestasi</title>
</head>
<body>
    <h2>Tambah Data</h2>
    <?php
    include "koneksi.php";

    if(isset($_POST['nama'])){
        $nama           = $_POST['nama'];
        $email          = $_POST['email'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $alamat         = $_POST['alamat'];
        
        if($nama == "" || $email == "" || $jenis_kelamin == "" || $alamat == ""){
            echo '<script>alert("Semua data harus diisi!.")</script>';
        }else{

            $query = mysqli_query($koneksi, "INSERT into mahasiswa (nama,email,jenis_kelamin,alamat) values('$nama','$email','$jenis_kelamin','$alamat')");

            if($query){
                echo '<script>alert("Tambah data berhasil")</script>';
            }else{
                echo '<script>alert("Tambah data gagal")</script>';
            }
        }
    }
    ?>
    <form method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat"></textarea></td>
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