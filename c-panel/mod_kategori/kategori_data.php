<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
            <a href="?p=kategori_create" class="btn btn-primary btn-icon-split mt-3">
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
                            <th>Nama kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $data = mysqli_query($conn, "select * from kategori_produk");
                        while ($hs = mysqli_fetch_assoc($data)) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <?php $no++; ?>
                                <td><?= $hs['nm_kategori'] ?></td>
                                <td>
                                    <a href="?p=kategori_edit&id=<?= $hs['id_kategori'] ?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Ubah</span>
                                    </a>
                                    <!-- <br> -->
                                    <a href="?p=kategori_proses&id=<?= $hs['id_kategori'] ?>" class="btn btn-danger btn-icon-split" onClick="return confirm('Yakin Ingin Menghapus ?')">
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