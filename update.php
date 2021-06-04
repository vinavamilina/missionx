<?php
include 'menu.php';
?>
<div class='container' id='Mahasiswa3'>
    <h3>Tambah Mahasiswa</h3>
    <hr>
    <form action='' method='POST' name='save'>
        <?php
        $koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');
        $id = $_GET['id'];
        $query = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
        while($d=mysqli_fetch_array($query)){
        ?>
        <table>
            <tr>
                <td><strong>Nama Mahasiswa</strong></td>
                <td>:</td>
                <td><input type="hidden" name="id_mahasiswa" value="<?php echo $d['id_mahasiswa']; ?>">
                    <input type='text' name='nama_mahasiswa' class='form-control' value='<?php echo $d['nama_mahasiswa']; ?>'></td>
            </tr>
            <tr>
                <td><strong>NIM</strong></td>
                <td>:</td>
                <td><input type='number' name='nim' class='form-control' value='<?php echo $d['nim']; ?>'>
                <td>
            </tr>
            <td><strong>Jenis Kelamin</strong></td>
            <td>:</td>

            <td>
                <input type='radio' name='jenis_kelamin' value='perempuan'>
                <label for='perempuan'>Perempuan</label>
                <input type='radio' name='jenis_kelamin' value='laki-laki'>
                <label for='laki-laki'>Laki-laki</label>
            </td>

            </tr>
            <tr>
                <td>
                    <input type='submit' value='Simpan' class='btn btn-success sm' name='save'>
                </td>
            </tr>
        </table>
        <?php
        }
        ?>
        <div class='row'></div>
    </form>
<?php
if (isset($_POST['save'])) {
    $id = $_POST['id_mahasiswa'];
    $nama = $_POST['nama_mahasiswa'];
    $nim = $_POST['nim'];
    $jk = $_POST['jenis_kelamin'];
    mysqli_query($koneksi,"UPDATE mahasiswa SET nama_mahasiswa='$nama',nim='$nim',jenis_kelamin='$jk' WHERE id_mahasiswa='$id'");
    header("location:mahasiswa.php");
}
?>
