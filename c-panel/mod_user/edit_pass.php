<?php
include "koneksi.php";
$id = $_GET['id_user'];
$data = mysqli_query($conn, "SELECT * from user WHERE id_user='$id'");
$hs = mysqli_fetch_assoc($data); {
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Isikan Data user yang ingin diubah</h6>
      </div>
      <div class="card-body">
        <form action="?p=user_proses" onSubmit="return validasi(this);" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="hidden" value="<?= $hs['id_user']; ?>" required name="id" class="form-control" id="">
                <input type="text" readonly value="<?= $hs['nama_user']; ?>" required name="nama_user" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <small class="form-text text-muted">*) Password Minimal delapan karakter, setidaknya satu huruf, satu angka, dan satu karakter khusus</small>
                <input type="password" required name="password" class="form-control" id="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">
              </div>
              <div class="form-group">
                <label for="password1">Konfimasi Password</label>
                <input type="password" required name="password" class="form-control" id="password1">
              </div>
            </div>
          </div>
          <button type="submit" name="edit_pass" class="btn btn-primary btn-sm">Simpan</button>
          <a href="?p=user_data" class="btn btn-primary btn-sm">Batal</a>
        </form>
      <?php } ?>
      </div>
    </div>
  </div>


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