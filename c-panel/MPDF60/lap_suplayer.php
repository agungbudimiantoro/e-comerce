
<?php 
include"koneksi.php";
// tambah data
if(isset($_POST['add'])){

   $id_sup   = mysqli_real_escape_string($koneksi, $_POST['id_sup']);
   $nm_sup   = mysqli_real_escape_string($koneksi, $_POST['nm_sup']);
   $tlp_sup   = mysqli_real_escape_string($koneksi, $_POST['tlp_sup']);
   $alamat_sup   = mysqli_real_escape_string($koneksi, $_POST['alamat_sup']);
   
 
  
 $query = ("insert  into tb_suplayer values('".$id_sup."','".$nm_sup."','".$tlp_sup."','".$alamat_sup."')");
 if(mysqli_query($koneksi, $query))
  { ?> 
  <div class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	Data Berhs Disimpan
	</div> 
  <?php }else{ ?> 
  <div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	Data Gagal Disimpan
	</div>
	<?php } } ?>

<?php 
include"koneksi.php";
// Edit data
if(isset($_POST['edit'])){

   $id_sup   = mysqli_real_escape_string($koneksi, $_POST['id_sup']);
   $nm_sup   = mysqli_real_escape_string($koneksi, $_POST['nm_sup']);
   $tlp_sup   = mysqli_real_escape_string($koneksi, $_POST['tlp_sup']);
   $alamat_sup   = mysqli_real_escape_string($koneksi, $_POST['alamat_sup']);
   
  
 $query = ("update tb_suplayer set id_sup='".$id_sup."',nm_sup='".$nm_sup."',tlp_sup='".$tlp_sup."',alamat_sup='".$alamat_sup."' where id_sup='".$id_sup."'");
 if(mysqli_query($koneksi, $query))
  { ?> 
  <div class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	Data Berhasil Dirubah
	</div> 
  <?php }else{ ?> 
  <div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	Data Gagal Dirubah
	</div>
	<?php } } ?>

	


<p>
<a href="?p=suplayer_add" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Tambah Data</a>

<a href="mod_suplayer/sup_laporan.php" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> Cetak Data</a>
</p>



<div class="table-responsive">
		<table id="example1" class="table table-bordered table-striped table-hover">
			 <!-- <table id="example1" class="table table-hover table-bordered table-striped"> -->
			<thead>
				<tr>
					 <th>No</th>
                  <th>ID. Suplayer</th>
                  <th>Nama</th>
                  <th>Telp</th>
                  <th>Alamat</th>
                  <th>Action</th>			
				</tr>
			</thead>
			
			<tbody>
<?php 
    include "koneksi.php";
    $no = 1;
    $data = mysqli_query($koneksi,"select * from tb_suplayer");
    while($hs = mysqli_fetch_array($data)){
      ?>

				<tr>
					  <td><?php echo $no++; ?></td>
                  <td><?php echo $hs['id_sup'];?></td>
                  <td><?php echo $hs['nm_sup'];?></td>
                  <td><?php echo $hs['tlp_sup'];?></td>
                  <td><?php echo $hs['alamat_sup'];?></td>
                  

                  
<td>
<a href="?p=suplayer_edit&id_sup=<?php echo $hs['id_sup'];?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a>

<a href="?p=suplayer_del&id_sup=<?php echo $hs['id_sup'];?>" type="submit"  name="del" onclick="return confirm('Yakin Hapus Data? <?php echo $hs['nm_sup'];?>')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
</td>
				</tr>
				<?php } ?>
			</tbody>
			 
		</table>
	</div>

