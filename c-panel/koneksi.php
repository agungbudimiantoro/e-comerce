<?php date_default_timezone_set("Asia/jakarta"); ?>
<?php
$conn = mysqli_connect("localhost", "root", "", "marketplace");

// cek koneksi
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
