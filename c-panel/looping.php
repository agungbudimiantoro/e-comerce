<?php

include "koneksi.php";
$i = 0;
for ($i = 1; $i <= 40; $i++) {
  $query = "INSERT into kursi values(null,'" . $i . "')";
  if (mysqli_query($conn, $query)) {
    echo $i;
  } else {
    echo "gagal" . $i;
  }
}
//     if (mysqli_query($conn, $query)) {

//       echo "
//     <script language=javascript>
//       alert('Data Baru Berhasil Ditambah');
//     </script>";
//     } else {
//       echo "
//       <script language=javascript>
//         alert('Data Gagal  Ditambah');
//       </script>";
//     }