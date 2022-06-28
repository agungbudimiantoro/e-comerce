<?php include 'koneksi.php'; ?>

<?php
// tambah data
if (isset($_POST['add'])) {

  $nm_kategori       = htmlspecialchars($_POST['nm_kategori']);


  $query_hitung = mysqli_query($conn, "SELECT MAX(id_kategori) as id FROM kategori_produk");
  $data_hitung = mysqli_fetch_array($query_hitung);
  $id_hitung = $data_hitung['id'];
  $urt = (int) substr($id_hitung, 3, 4);
  $urt++;
  $hrf = "KAT";
  $id_hitung = $hrf . sprintf("%03s", $urt);


  // $query = ("INSERT  into admin values('admin2001','" . $nm_admin . "','" . $username . "','" . $password_baru . "', '" . $level . "','" . $foto_baru . "')");
  $query = ("INSERT  into kategori_produk values('" . $id_hitung . "','" . $nm_kategori . "')");
  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Data Baru Berhasil Ditambah');
      document.location.href='?p=kategori_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Data Gagal  Ditambah');
        document.location.href='?p=kategori_data';
      </script>";
  }
}
?>

<?php
// edit data
if (isset($_POST['edit'])) {

  $id       = htmlspecialchars($_POST['id']);

  $nm_kategori       = htmlspecialchars($_POST['nm_kategori']);


  $query = ("UPDATE kategori_produk SET 
  nm_kategori='" . $nm_kategori . "'
   WHERE id_kategori='" . $id . "' ");

  if (mysqli_query($conn, $query)) {
    echo "
    <script language=javascript>
      alert('Data Berhasil Dirubah');
      document.location.href='?p=kategori_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Data Gagal Dirubah');
        document.location.href='?p=kategori_data';
      </script>";
  }
}
?>



<?php
// if (isset($_GET['hapus'])) {

$id    = htmlspecialchars($_GET['id']);
$query = ("DELETE from kategori_produk where id_kategori='" . $id . "'");
if (mysqli_query($conn, $query)) {

  echo "
        <script language=javascript>
          alert('Data Berhasil Dihapus');
          document.location.href='?p=kategori_data';
        </script>";
} else {
  echo "
        <script language=javascript>
          alert('Data Gagal Dihapus');
          document.location.href='?p=kategori_data';
        </script>";
  // }
} ?>
