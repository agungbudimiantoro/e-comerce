<?php include 'koneksi.php'; ?>

<?php
// tambah data
if (isset($_POST['add'])) {

  $nama_user       = htmlspecialchars($_POST['nama_user']);
  $username   = htmlspecialchars(strtolower($_POST['username']));
  $password   = mysqli_real_escape_string($conn, $_POST['password']);
  $level      = htmlspecialchars($_POST['level']);
  $foto      = htmlspecialchars($_POST['foto']);
  $no_hp      = htmlspecialchars($_POST['no_hp']);
  $alamat      = htmlspecialchars($_POST['alamat']);


  $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  $hasil = mysqli_fetch_assoc($query);
  if ($hasil) {
    echo "
    <script language=javascript>
      alert('Username tersebut sudah terdaftar');
      document.location.href='?p=user_create';
    </script>";
    return false;
  }

  $temp = "foto/";
  if (!file_exists($temp))
    mkdir($temp);

  $foto      = $_FILES['foto']['tmp_name'];
  $ImageName       = $_FILES['foto']['name'];
  $ImageType       = $_FILES['foto']['type'];

  if (!empty($foto)) {
    // mengacak angka untuk nama file
    // $acak = rand(00000000, 99999999);
    $acak = rand();
    $tgl  = date('Ymd_His');

    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.', '', $ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    // $NewImageName   = $tgl . '_' . $ImageName . '.' . $ImageExt;
    $foto_baru   = $ImageName . '_' . $acak . '.' . $ImageExt;

    move_uploaded_file($_FILES["foto"]["tmp_name"], $temp . $foto_baru);

    $password_baru = password_hash($password, PASSWORD_DEFAULT);


    $query_hitung = mysqli_query($conn, "SELECT MAX(id_user) as id FROM user");
    $data_hitung = mysqli_fetch_array($query_hitung);
    $id_hitung = $data_hitung['id'];
    $urt = (int) substr($id_hitung, 3, 4);
    $urt++;
    $hrf = "USR";
    $id_hitung = $hrf . sprintf("%03s", $urt);


    // $query = ("INSERT  into admin values('admin2001','" . $nm_admin . "','" . $username . "','" . $password_baru . "', '" . $level . "','" . $foto_baru . "')");
    $query = ("INSERT  into user values('" . $id_hitung . "','" . $nama_user . "','" . $username . "','" . $password_baru . "', '" . $no_hp . "', '" . $alamat . "', '" . $level . "','" . $foto_baru . "')");
    if (mysqli_query($conn, $query)) {

      echo "
    <script language=javascript>
      alert('Data Baru Berhasil Ditambah');
      document.location.href='?p=user_data';
    </script>";
    } else {
      echo "
      <script language=javascript>
        alert('Data Gagal  Ditambah');
        document.location.href='?p=user_data';
      </script>";
    }
  }
}
?>

<?php
// edit data
if (isset($_POST['edit'])) {

  $id       = htmlspecialchars($_POST['id']);
  $nama_user       = htmlspecialchars($_POST['nama_user']);
  $username   = htmlspecialchars(strtolower($_POST['username']));
  $password   = mysqli_real_escape_string($conn, $_POST['password']);
  $level      = htmlspecialchars($_POST['level']);
  $foto      = htmlspecialchars($_POST['foto']);
  $no_hp      = htmlspecialchars($_POST['no_hp']);
  $alamat      = htmlspecialchars($_POST['alamat']);

  $query = ("UPDATE user SET 
  nama_user='" . $nama_user . "'
  , username='" . $username . "'
  , level='" . $level . "'
  , no_hp='" . $no_hp . "'
  , alamat='" . $alamat . "'
   WHERE id_user='" . $id . "' ");

  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Data Berhasil Dirubah');
      document.location.href='?p=user_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Data Gagal Dirubah');
        document.location.href='?p=user_data';
      </script>";
  }
}
?>

<?php
// edit data pass
if (isset($_POST['edit_pass'])) {

  $id       = htmlspecialchars($_POST['id']);
  $password   = mysqli_real_escape_string($conn, $_POST['password']);

  $password_baru = password_hash($password, PASSWORD_DEFAULT);

  $query = ("UPDATE user  SET password='" . $password_baru . "' WHERE id_user='" . $id . "' ");

  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Password Berhasil Dirubah');
      document.location.href='?p=user_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Password Gagal Dirubah');
        document.location.href='?p=user_data';
      </script>";
  }
}
?>

<?php
// edit data sts
if (isset($_POST['edit_sts'])) {

  $id_user       = htmlspecialchars($_GET['id_user']);
  $sts_user   = mysqli_real_escape_string($conn, $_GET['sts_user']);

  $query = ("UPDATE tb_user  SET status='" . $sts_user . "' WHERE id_user='" . $id_user . "' ");

  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Status User Berhasil Dirubah');
      document.location.href='?p=user_data';
    </script>";
    die;
  } else {
    echo "
      <script language=javascript>
        alert('Status User Gagal Dirubah');
        document.location.href='?p=user_data';
      </script>";
    die;
  }
}
?>

<?php
// edit data sts
if (isset($_POST['edit_foto'])) {

  $id      = htmlspecialchars($_POST['id']);
  $foto         = mysqli_real_escape_string($conn, $_POST['foto']);
  $foto1        = mysqli_real_escape_string($conn, $_POST['foto1']);



  $temp = "foto/";
  if (!file_exists($temp))
    mkdir($temp);

  $foto      = $_FILES['foto']['tmp_name'];
  $ImageName       = $_FILES['foto']['name'];
  $ImageType       = $_FILES['foto']['type'];

  if (!empty($foto)) {
    // mengacak angka untuk nama file
    // $acak = rand(00000000, 99999999);
    $acak = rand();
    $tgl  = date('Ymd_His');

    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.', '', $ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    // $NewImageName   = $tgl . '_' . $ImageName . '.' . $ImageExt;
    $foto_baru   = $ImageName . '_' . $acak . '.' . $ImageExt;

    if (mysqli_query($conn, $query)) {
      if (file_exists("foto/" . $foto1)) {
        unlink("foto/" . $foto1);
      }
    }

    move_uploaded_file($_FILES["foto"]["tmp_name"], $temp . $foto_baru);

    $query = ("UPDATE user  SET foto='" . $foto_baru . "' WHERE id_user='" . $id . "' ");

    if (mysqli_query($conn, $query)) {
      $_SESSION['foto'] = $foto_baru;
      echo "
    <script language=javascript>
      alert('Foto user Berhasil Dirubah');
      document.location.href='?p=user_data';
    </script>";
    } else {
      echo "
      <script language=javascript>
        alert('Foto user Gagal Dirubah');
        document.location.href='?p=user_data';
      </script>";
    }
  }
}

?>

<?php
// if (isset($_GET['hapus'])) {

$id    = htmlspecialchars($_GET['id']);
$foto      = htmlspecialchars($_GET['foto']);
$query = ("DELETE from user where id_user='" . $id . "'");
if (mysqli_query($conn, $query)) {
  if (file_exists("foto/" . $foto)) {
    unlink("foto/" . $foto);
  }
  echo "
        <script language=javascript>
          alert('Data Berhasil Dihapus');
          document.location.href='?p=user_data';
        </script>";
} else {
  echo "
        <script language=javascript>
          alert('Data Gagal Dihapus');
          document.location.href='?p=user_data';
        </script>";
  // }
} ?>
