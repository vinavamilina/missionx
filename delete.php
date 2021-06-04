<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mahasiswa='$id'");
header("location:mahasiswa.php");
