<?php
include "koneksi.php";
$data = mysqli_query($conn, "SELECT * from user WHERE id_user='$id_user'");
$hs = mysqli_fetch_assoc($data); {
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Isikan foto yang ingin diubah</h6>
            </div>
            <div class="card-body">
                <form action="?p=user_proses" onSubmit="return validasi(this);" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="hidden" value="<?= $hs['id_user']; ?>" required name="id" class="form-control" id="">

                                <input type="hidden" value="<?= $hs['foto']; ?>" name="foto1" class="form-control">

                                <img src='foto/<?= $hs['foto']; ?>' width='70' height='90' />
                                <div class="sub-title">File Foto</div>
                                <small class="form-text text-muted">Extensi File Hanya .JPG, .JPEG, .PNG</small>
                                <div>
                                    <input type="file" autofocus name="foto" onchange="validate(this);" required class="form-control" id="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="edit_foto" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="?p=user_data" class="btn btn-primary btn-sm">Batal</a>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>


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