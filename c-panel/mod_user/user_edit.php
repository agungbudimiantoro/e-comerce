<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * from user WHERE id_user='$id'");
$hs = mysqli_fetch_assoc($data); {
?>

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Isikan Data User yang ingin diubah</h6>
      </div>
      <div class="card-body">
        <form action="?p=user_proses" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama</label>

                <input type="hidden" value="<?= $hs['id_user']; ?>" required name="id" class="form-control" id="">
                <input type="text" required name="nama_user" class="form-control" id="nama" value="<?= $hs['nama_user']  ?>">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" required name="username" class="form-control" id="username" value="<?= $hs['username']  ?>">
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <select name="level" required class="form-control" id="level">
                  <option value="">Pilih Level</option>
                  <option <?php if ($hs['level'] == 'Admin') {
                            echo "selected";
                          } ?> value='Admin'>Admin</option>
                  <option <?php if ($hs['level'] == 'Pimpinan') {
                            echo "selected";
                          } ?> value='Pimpinan'>Pimpinan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="no_hp">No hp</label>
                <input type="text" value="<?= $hs['no_hp']; ?>" required name="no_hp" class="form-control" id="no_hp">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" value="<?= $hs['alamat']; ?>" required name="alamat" class="form-control" id="alamat">
              </div>
            </div>
          </div>

          <button type="submit" name="edit" class="btn btn-primary btn-sm">Ubah</button>
          <a href="?p=user_data" class="btn btn-primary btn-sm">Batal</a>
        </form>


      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


<?php } ?>