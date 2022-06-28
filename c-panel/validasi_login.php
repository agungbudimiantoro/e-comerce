<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include "koneksi.php";

// menangkap data yang dikirim dari form login
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
// query
$login = mysqli_query($conn, "select * from user where username='" . $username . "'");
$data = mysqli_fetch_assoc($login);
$cek = mysqli_num_rows($login);

//untuk menentukan expire cookie, dihtung dri waktu server + waktu umur cookie          
$time = time();
//cek jika setcookie di cek set cookie jika tidak ''
$check = isset($_POST['setcookie']) ? $_POST['setcookie'] : '';

if ($cek > 0) {
    if (password_verify($password, $data['password'])) {
        if ($data['level'] == 'Admin') {
            $_SESSION['username'] = $username;
            $_SESSION['nama_user'] = $data['nama_user'];
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['foto'] = $data['foto'];
            //jika remembere me, set cookie
            if ($check) {
                setcookie("cookielogin[username]", $username, $time + 3600);
                setcookie("cookielogin[password]", $username, $time + 3600);
            }
            header("location:hal_admin.php?p=beranda");
            die();
        }
        if ($data['level'] == 'Pimpinan') {
            $_SESSION['username'] = $username;
            $_SESSION['nama_user'] = $data['nama_user'];
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['foto'] = $data['foto'];
            //jika remembere me, set cookie
            if ($check) {
                setcookie("cookielogin[username]", $username, $time + 3600);
                setcookie("cookielogin[password]", $username, $time + 3600);
            }
            header("location:hal_pimpinan.php?p=beranda");
            die();
        }
    } else {
        header("location:login.php?pesan=gagal");
    }
} else {
    header("location:login.php?pesan=gagal1");
}
