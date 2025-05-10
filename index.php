<?php
    include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa Berpresetasi</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis Kelalin</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
            while ($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo  $i; ?></td>
            <td><?php echo  $data['nama']; ?></td>
            <td><?php echo  $data['email']; ?></td>
            <td><?php echo  $data['jenis_kelamin']; ?></td>
            <td><?php echo  $data['alamat']; ?></td>
            <td>
                <a href="ubah.php?id=<?php echo $data['id']; ?>">Ubah</a>
                |
                <a onclick="return confirm('Apakah Anda ingin menghapus data ini?');" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php
            $i++;
            }
        ?>
    </table>
</body>
</html>