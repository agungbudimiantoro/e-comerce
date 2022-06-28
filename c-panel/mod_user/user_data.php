<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
            <a href="?p=user_create" class="btn btn-primary btn-icon-split mt-3">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama user</th>
                            <th>Username</th>
                            <th>no hp</th>
                            <th>alamat</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama user</th>
                            <th>Username</th>
                            <th>no hp</th>
                            <th>alamat</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $data = mysqli_query($conn, "select * from user");
                        while ($hs = mysqli_fetch_assoc($data)) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <?php $no++; ?>
                                <td><?= $hs['nama_user'] ?></td>
                                <td><?= $hs['username'] ?></td>
                                <td><?= $hs['no_hp'] ?></td>
                                <td><?= $hs['alamat'] ?></td>
                                <td><?= $hs['level'] ?></td>
                                <td>
                                    <a href="?p=user_edit&id=<?= $hs['id_user'] ?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Ubah</span>
                                    </a>
                                    <!-- <br> -->
                                    <a href="?p=user_proses&id=<?= $hs['id_user'] ?>&foto=<?= $hs['foto'] ?>" class="btn btn-danger btn-icon-split" onClick="return confirm('Yakin Ingin Menghapus ?')">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->