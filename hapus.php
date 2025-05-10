<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");
    header('location:index.php'); //kembali ke index setelah hapus
?>