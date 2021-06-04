<?php
ob_start();
include 'menu.php';
echo "<div class='container' id='Mahasiswa3'>
    <h3>Tambah Mahasiswa</h3>
    <hr>
    <form action='' method='POST' name='save'>
        <table>
            <tr>
                <td><strong>Nama Mahasiswa</strong></td>
                <td>:</td>
                <td><input type='text' name='nama_mahasiswa' class='form-control'></td>
            </tr>
            <tr>
                <td><strong>NIM</strong></td>
                <td>:</td>
                <td><input type='number' name='nim' class='form-control'>
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
$data = mysqli_query($koneksi, 'SELECT * FROM mahasiswa');
while ($d = mysqli_fetch_array($data)) {
  echo "
            <tbody>
                <tr>
                    <td>";
  echo $n++;
  echo "</td>
                    <td>";
  echo $d['nim'];
  echo "</td>
                    <td>";
  echo $d['nama_mahasiswa'];
  echo "</td>
                    <td>";
  echo $d['jenis_kelamin'];
  echo "</td>
    <td>
    <button type='button' data-toggle='modal' data-target='#exampleModal";
  echo $n;
  echo "' class='btn btn-danger sm'>Hapus</button>
  <a href='update.php?id=";
  echo $d['id_mahasiswa'];
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
        <a href='delete.php?id=";
  echo $d['id_mahasiswa'];
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
if (isset($_POST['save'])) {
  $nim = $_POST['nim'];
  $nama = $_POST['nama_mahasiswa'];
  $jk = $_POST['jenis_kelamin'];
  mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES(NULL,'$nama','$nim','$jk')");
  exit(header("location:mahasiswa.php"));
  exit();
}
