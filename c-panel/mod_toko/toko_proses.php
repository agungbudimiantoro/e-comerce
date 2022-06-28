<?php include 'koneksi.php'; ?>

<?php
// tambah data
if (isset($_POST['add'])) {

  $nm_toko       = htmlspecialchars($_POST['nm_toko']);
  $alamat      = htmlspecialchars($_POST['alamat']);
  $no_hp      = htmlspecialchars($_POST['no_hp']);
  $status_toko      = htmlspecialchars($_POST['status_toko']);
  $ket      = htmlspecialchars($_POST['ket']);


  $query = mysqli_query($conn, "SELECT * FROM toko WHERE nm_toko = '$nm_toko'");
  $hasil = mysqli_fetch_assoc($query);
  if ($hasil) {
    echo "
    <script language=javascript>
      alert('nama toko tidak tersedia');
      document.location.href='?p=toko_create';
    </script>";
    return false;
  }


  $query_hitung = mysqli_query($conn, "SELECT MAX(id_toko) as id FROM toko");
  $data_hitung = mysqli_fetch_array($query_hitung);
  $id_hitung = $data_hitung['id'];
  $urt = (int) substr($id_hitung, 3, 4);
  $urt++;
  $hrf = "TOK";
  $id_hitung = $hrf . sprintf("%03s", $urt);


  // $query = ("INSERT  into admin values('admin2001','" . $nm_admin . "','" . $username . "','" . $password_baru . "', '" . $level . "','" . $foto_baru . "')");
  $query = ("INSERT  into toko values('" . $id_hitung . "','" . $nm_toko . "', '" . $alamat . "', '" . $no_hp . "', '" . $status_toko . "','" . $ket . "')");
  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Data Baru Berhasil Ditambah');
      document.location.href='?p=toko_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Data Gagal  Ditambah');
        document.location.href='?p=toko_data';
      </script>";
  }
}
?>

<?php
// edit data
if (isset($_POST['edit'])) {

  $id       = htmlspecialchars($_POST['id']);

  $nm_toko       = htmlspecialchars($_POST['nm_toko']);
  $alamat      = htmlspecialchars($_POST['alamat']);
  $no_hp      = htmlspecialchars($_POST['no_hp']);
  $status_toko      = htmlspecialchars($_POST['status_toko']);
  $ket      = htmlspecialchars($_POST['ket']);

  $query = mysqli_query($conn, "SELECT * FROM toko WHERE nm_toko = '$nm_toko'");
  $hasil = mysqli_fetch_assoc($query);
  if ($hasil) {
    echo "
    <script language=javascript>
      alert('nama toko tidak tersedia');
      document.location.href='?p=toko_create';
    </script>";
    return false;
  }

  $query = ("UPDATE toko SET 
  nm_toko='" . $nm_toko . "'
  , alamat='" . $alamat . "'
  , alamat='" . $alamat . "'
  , no_hp='" . $no_hp . "'
  , status_toko='" . $status_toko . "'
  , ket='" . $ket . "'
   WHERE id_toko='" . $id . "' ");

  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Data Berhasil Dirubah');
      document.location.href='?p=toko_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Data Gagal Dirubah');
        document.location.href='?p=toko_data';
      </script>";
  }
}
?>



<?php
// if (isset($_GET['hapus'])) {

$id    = htmlspecialchars($_GET['id']);
$query = ("DELETE from toko where id_toko='" . $id . "'");
if (mysqli_query($conn, $query)) {

  echo "
        <script language=javascript>
          alert('Data Berhasil Dihapus');
          document.location.href='?p=toko_data';
        </script>";
} else {
  echo "
        <script language=javascript>
          alert('Data Gagal Dihapus');
          document.location.href='?p=toko_data';
        </script>";
  // }
} ?>
