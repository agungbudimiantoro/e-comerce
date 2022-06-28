<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Isikan Data toko</h6>
    </div>
    <div class="card-body">
      <form action="?p=toko_proses" onSubmit="return validasi(this);" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="nama">Nama toko</label>
              <input type="text" required name="nm_toko" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" required name="alamat" class="form-control" id="alamat">
            </div>
            <div class="form-group">
              <label for="no_hp">No hp</label>
              <input type="text" required name="no_hp" class="form-control" id="no_hp">
            </div>
            <div class="form-group">
              <label for="status_toko">status</label>
              <input type="text" required name="status_toko" class="form-control" id="status_toko">
            </div>
            <div class="form-group">
              <label for="ket">keterangan</label>
              <input type="text" required name="ket" class="form-control" id="ket">
            </div>
          </div>
        </div>

        <button type="submit" name="add" class="btn btn-primary btn-sm">Simpan</button>
        <a href="?p=toko_data" class="btn btn-primary btn-sm">Batal</a>
      </form>


    </div>
  </div>

</div>
<!-- /.container-fluid -->