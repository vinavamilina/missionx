<?php
include 'menu.php';
echo "<div class='container'>
    <h3>Tambah Buku</h3>
    <hr>
    <form action='' method='POST' name='save2'>
        <table>
            <tr>
                <td><strong>Kode Buku</strong></td>
                <td>:</td>
                <td><input type='text' name='kode_buku' class='form-control'></td>
            </tr>
            <tr>
                <td><strong>Judul Buku</strong></td>
                <td>:</td>
                <td><input type='text' name='nama_buku' class='form-control'>
                <td>
            </tr>
            <td><strong>Nama Penerbit</strong></td>
                <td>:</td>
                <td><input type='text' name='nama_penerbit' class='form-control'>
                <td>

            </tr>
            <tr>
                <td>
                    <input type='submit' value='Simpan' class='btn btn-success sm' name='save2'>
                </td>
            </tr>
        </table>

        <div class='row'></div>
    </form>

    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>NO</th>
                <th scope='col'>NIM</th>
                <th scope='col'>NAMA</th>
                <th scope='col'>JENIS KELAMIN</th>
                <th scope='col'>Aksi</th>
            </tr>
        </thead>";
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');
$n = 1;
$data = mysqli_query($koneksi, 'SELECT * FROM buku');
while ($d = mysqli_fetch_array($data)) {
    echo "
            <tbody>
                <tr>
                    <td>";
    echo $n++;
    echo "</td>
                    <td>";
    echo $d['kode_buku'];
    echo "</td>
                    <td>";
    echo $d['nama_buku'];
    echo "</td>
                    <td>";
    echo $d['nama_penerbit'];
    echo "</td>
    <td>
    <button type='button' data-toggle='modal' data-target='#exampleModal";
  echo $n;
  echo "' class='btn btn-danger sm'>Hapus</button>
    <a href='update_buku.php?id=";
    echo $d['kode_buku'];
    echo "' class='btn btn-success sm'>Edit</a>
    <div class='modal fade' id='exampleModal";
  echo $n;
  echo "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Hapus</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Apakah yakin pengen dihapus?
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <a href='delete_buku.php?id=";
  echo $d['kode_buku'];
  echo "' class='btn btn-danger'>Delete</a>
      </div>
    </div>
  </div>
</div>
                </tr>
            </tbody>";
}

echo "</table>
</div>

";
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');
if (isset($_POST['save2'])) {
    $kode_buku = $_POST['kode_buku'];
    $nama = $_POST['nama_buku'];
    $penerbit = $_POST['nama_penerbit'];
    mysqli_query($koneksi, "INSERT INTO buku VALUES(NULL,'$kode_buku','$nama','$penerbit')");
    header("location:buku.php");
    exit();
}
