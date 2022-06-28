<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Isikan Data User Baru</h6>
    </div>
    <div class="card-body">
      <form action="?p=user_proses" onSubmit="return validasi(this);" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" required name="nama_user" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" required name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
              <label for="level">Level</label>
              <select name="level" required class="form-control" id="level">
                <option value="">Pilih Level</option>
                <option value="Admin">Admin</option>
                <option value="Pimpinan">Pimpinan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="no_hp">No hp</label>
              <input type="text" required name="no_hp" class="form-control" id="no_hp">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" required name="alamat" class="form-control" id="alamat">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="password">Password</label>
              <small class="form-text text-muted">*) Password Minimal delapan karakter, setidaknya satu huruf, satu angka, dan satu karakter khusus</small>
              <input type="password" required name="password" class="form-control" id="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">
            </div>
            <div class="form-group">
              <label for="password1">Konfimasi Password</label>
              <input type="password" required name="password" class="form-control" id="password1">
            </div>
            <div class="form-group">
              <div class="sub-title">File Foto</div>
              <small class="form-text text-muted">Extensi File Hanya .JPG, .JPEG, .PNG</small>
              <div>
                <input type="file" name="foto" onchange="validate(this);" required class="form-control" id="file">
              </div>
            </div>
          </div>
        </div>


        <button type="submit" name="add" class="btn btn-primary btn-sm">Simpan</button>
        <a href="?p=user_data" class="btn btn-primary btn-sm">Batal</a>
      </form>


    </div>
  </div>

</div>
<!-- /.container-fluid -->


<script type="text/javascript">
  window.onload = function() {
    document.getElementById("password").onchange = validatePassword;
    document.getElementById("password1").onchange = validatePassword;
  }

  function validatePassword() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("password1").value;
    if (pass1 != pass2)
      document.getElementById("password1").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
    else
      document.getElementById("password1").setCustomValidity('');
  }
</script>

<script>
  var _validFileExtensions = [".jpg", ".jpeg", ".png"];

  function validate(file) {
    if (file.type == "file") {
      var sFileName = file.value;
      if (sFileName.length > 0) {
        var blnValid = false;
        for (var j = 0; j < _validFileExtensions.length; j++) {
          var sCurExtension = _validFileExtensions[j];
          if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
            blnValid = true;
            break;
          }
        }

        if (!blnValid) {
          alert("Maaf, Hanya File yang Berextensi : " + _validFileExtensions.join(", "));
          file.value = "";
          return false;
        }
      }
    }
    return true;
  }
</script>