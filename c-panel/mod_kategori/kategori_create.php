<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Isikan Data kategori</h6>
    </div>
    <div class="card-body">
      <form action="?p=kategori_proses" onSubmit="return validasi(this);" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="nama">Nama kategori</label>
              <input type="text" required name="nm_kategori" class="form-control" id="nama">
            </div>
          </div>
        </div>

        <button type="submit" name="add" class="btn btn-primary btn-sm">Simpan</button>
        <a href="?p=kategori_data" class="btn btn-primary btn-sm">Batal</a>
      </form>


    </div>
  </div>

</div>
<!-- /.container-fluid -->