<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * from kategori_produk WHERE id_kategori='$id'");
$hs = mysqli_fetch_assoc($data); {
?>

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Isikan Data kategori yang ingin diubah</h6>
      </div>
      <div class="card-body">
        <form action="?p=kategori_proses" method="POST" enctype="multipart/form-data">
          <input type="hidden" value="<?= $id; ?>" required name="id" class="form-control" id="">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="nama">Nama kategori</label>
                <input type="text" value="<?= $hs['nm_kategori']; ?>" required name="nm_kategori" class="form-control" id="nama">
              </div>
            </div>
          </div>

          <button type="submit" name="edit" class="btn btn-primary btn-sm">Ubah</button>
          <a href="?p=kategori_data" class="btn btn-primary btn-sm">Batal</a>
        </form>


      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


<?php } ?>