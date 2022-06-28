<?php
include '../koneksi.php';
 // Define relative path from this script to mPDF
$nama_dokumen='Laporan Data Stok'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>

<div align="center"><strong> LAPORAN DATA STOK BARANG <br> 
  A4P GROUP <br> 
KOTA LUBUKLINGGAU</strong></div><br />

PERIODE TANGGAL :  (<?PHP echo $_POST['tgl_awal'];?>) - (<?PHP echo $_POST['tgl_akhir'];?>)

<div class="table-responsive">
		<table width="100%" border="1" align="center" class="table table-bordered table-striped table-hover">
			 <!-- <table id="example1" class="table table-hover table-bordered table-striped"> -->
			<thead>
				<tr>
					 <th>No</th>
                  <th>Suplayer</th>
                  <th>Nama Barang</th>
                  <th>Tgl. Stok</th>
                  <th>Jlh. BRG</th>
                  <th>Harga @ Rp.</th>
                  <th>Total Harga Rp.</th>
				</tr>
			</thead>
			
			<tbody>
<?php 

    include_once '../koneksi.php';

   $id_sup   = mysqli_real_escape_string($koneksi, $_POST['id_sup']);
   $id_brg   = mysqli_real_escape_string($koneksi, $_POST['id_brg']);
    $tgl_awal   = mysqli_real_escape_string($koneksi, $_POST['tgl_awal']);
    $tgl_akhir   = mysqli_real_escape_string($koneksi, $_POST['tgl_akhir']);

    $no = 1;
    $data = mysqli_query($koneksi,"select * from tb_suplayer, tb_brg, tb_stok WHERE tb_suplayer.id_sup=tb_stok.id_sup AND tb_brg.id_brg=tb_stok.id_brg && tb_suplayer.id_sup='".$id_sup."' && tb_brg.id_brg='".$id_brg."' && tb_stok.tgl_stok between '".$tgl_awal."' and '".$tgl_akhir."' ");
    while($hs = mysqli_fetch_array($data)){
      $a= $hs['hrg_brg'];
      $b= $hs['jlh_brg'];
      $c= $a * $b;
      // $d = number_format($c,2,',','.');
      ?>

				<tr>
					  <td align="center"><?php echo $no++; ?></td>
            <td><?php echo $hs['id_sup'];?>-<?php echo $hs['nm_sup'];?></td>
                  <td><?php echo $hs['id_brg'];?>-<?php echo $hs['nm_brg'];?></td>
                  <td><?php echo $hs['tgl_stok'];?></td>
                  <td align="center"><?php echo $hs['jlh_brg'];?></td>
                  <td align="right">Rp. <?php echo number_format($hs['hrg_brg'],2,',','.');?></td>
                  <td align="right">Rp. <?php echo number_format($c,2,',','.');?></td>
				</tr>
				<?php } ?>
				<tr>
				  <td colspan="4" align="center"><strong>Jumlah  </strong></td>
				  <td align="center"><strong>
			      <?php 

    include_once '../koneksi.php';
$data = mysqli_query($koneksi,"select sum(tb_stok.jlh_brg) as jlh from tb_suplayer, tb_brg, tb_stok WHERE tb_suplayer.id_sup=tb_stok.id_sup AND tb_brg.id_brg=tb_stok.id_brg && tb_suplayer.id_sup='".$id_sup."' && tb_brg.id_brg='".$id_brg."' && tb_stok.tgl_stok between '".$tgl_awal."' and '".$tgl_akhir."'");
    while($hs = mysqli_fetch_array($data))
	{
	
      echo $hs['jlh'];
     
	} ?>
				  </strong></td>
				  <td align="right"><strong>Rp. 
		          <?php 

    include_once '../koneksi.php';
$data = mysqli_query($koneksi,"select sum(tb_stok.hrg_brg) as harga from tb_suplayer, tb_brg, tb_stok WHERE tb_suplayer.id_sup=tb_stok.id_sup AND tb_brg.id_brg=tb_stok.id_brg && tb_suplayer.id_sup='".$id_sup."' && tb_brg.id_brg='".$id_brg."' && tb_stok.tgl_stok between '".$tgl_awal."' and '".$tgl_akhir."'");
    while($hs = mysqli_fetch_array($data))
	{
	
      echo number_format($hs['harga'],2,',','.');
     
	} ?>
				  </strong></td>
				  <td align="right"><strong>Rp.
                  <?php 

    include_once '../koneksi.php';
$data = mysqli_query($koneksi,"select sum(tb_stok.jlh_brg) as jlh, sum(tb_stok.hrg_brg) as harga from tb_suplayer, tb_brg, tb_stok WHERE tb_suplayer.id_sup=tb_stok.id_sup AND tb_brg.id_brg=tb_stok.id_brg && tb_suplayer.id_sup='".$id_sup."' && tb_brg.id_brg='".$id_brg."' && tb_stok.tgl_stok between '".$tgl_awal."' and '".$tgl_akhir."'");
    while($hs = mysqli_fetch_array($data))
	{
		$a= $hs['jlh'];
      	$b= $hs['harga'];
      	$c= $a * $b;
	  
      echo number_format($c,2,',','.');
     
	} ?>
				  </strong></td>
			  </tr>
			</tbody>
  </table>
  <table width="100%" border="0" align="center">
  <tr>
    <td width="56%">&nbsp;</td>
    <td width="44%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Lubuklinggau,... Januari 2020<br /> Manager Perusahaan<br /><br /><br /><br />..............</td>
  </tr>
</table>

</div>

    <?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen .date(' Y-m-d').".pdf" ,'I');
exit;
?>