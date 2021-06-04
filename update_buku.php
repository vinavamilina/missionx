<?php
include 'menu.php';
?>
<div class='container'>
    <h3>Tambah Buku</h3>
    <hr>
    <form action='' method='POST' name='save2'>
        <?php
        $koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');
        $id = $_GET['id'];
        $query = mysqli_query($koneksi,"SELECT * FROM buku WHERE kode_buku='$id'");
        while($d=mysqli_fetch_array($query)){
        ?>
        <table>
            <tr>
                <td><strong>Kode Buku</strong></td>
                <td>:</td>
                <td><input type="hidden" name="id_buku" value="<?php echo $d['id_buku']; ?>">
                    <input type='text' name='kode_buku' value='<?php echo $d['kode_buku']; ?>' class='form-control'></td>
            </tr>
            <tr>
                <td><strong>Judul Buku</strong></td>
                <td>:</td>
                <td><input type='text' name='nama_buku' value='<?php echo $d['nama_buku']; ?>' class='form-control'>
                <td>
            </tr>
            <td><strong>Nama Penerbit</strong></td>
                <td>:</td>
                <td><input type='text' name='nama_penerbit' value='<?php echo $d['nama_penerbit']; ?>' class='form-control'>
                <td>

            </tr>
            <tr>
                <td>
                    <input type='submit' value='Simpan' class='btn btn-success sm' name='save2'>
                </td>
            </tr>
        </table>
        <?php
        }
        ?>
        <div class='row'></div>
    </form>
    <?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');
    if (isset($_POST['save2'])) {
        $id = $_POST['id_buku'];
        $kode_buku = $_POST['kode_buku'];
        $nama = $_POST['nama_buku'];
        $penerbit = $_POST['nama_penerbit'];
        mysqli_query($koneksi, "UPDATE buku SET kode_buku='$kode_buku', nama_buku='$nama', nama_penerbit='$penerbit' WHERE id_buku='$id'");
        header("location:buku.php");
        exit();
    }
    ?>
