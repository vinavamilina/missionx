<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM buku WHERE kode_buku='$id'");
header("location:buku.php");
