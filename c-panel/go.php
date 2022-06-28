<?php
$p             = empty($_GET['p']) ? "" : $_GET['p'];
if ($p == "") {
    $nav     = "Dashboard";
    $ambil     = "dashboard.php";
    //user 
} elseif ($p == "user_data") {
    $nav     = "Table user";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "user_create") {
    $nav     = "Buat user";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "user_edit") {
    $nav     = "user Edit";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "user_delete") {
    $nav     = "user Delete";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "user_proses") {
    $nav     = "user Proses";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "edit_pass") {
    $nav     = "Ubah Password";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "edit_foto") {
    $nav     = "Edit Foto";
    $ambil     = "mod_user/$p.php";
    //user 
    //toko 
} elseif ($p == "toko_data") {
    $nav     = "Table toko";
    $ambil     = "mod_toko/$p.php";
} elseif ($p == "toko_create") {
    $nav     = "Buat toko";
    $ambil     = "mod_toko/$p.php";
} elseif ($p == "toko_edit") {
    $nav     = "toko Edit";
    $ambil     = "mod_toko/$p.php";
} elseif ($p == "toko_delete") {
    $nav     = "toko Delete";
    $ambil     = "mod_toko/$p.php";
} elseif ($p == "toko_proses") {
    $nav     = "toko Proses";
    $ambil     = "mod_toko/$p.php";
    //toko 
    //kategori 
} elseif ($p == "kategori_data") {
    $nav     = "Table kategori produk";
    $ambil     = "mod_kategori/$p.php";
} elseif ($p == "kategori_create") {
    $nav     = "Buat kategori produk";
    $ambil     = "mod_kategori/$p.php";
} elseif ($p == "kategori_edit") {
    $nav     = "kategori Edit produk";
    $ambil     = "mod_kategori/$p.php";
} elseif ($p == "kategori_delete") {
    $nav     = "kategori Delete produk";
    $ambil     = "mod_kategori/$p.php";
} elseif ($p == "kategori_proses") {
    $nav     = "kategori Proses produk";
    $ambil     = "mod_kategori/$p.php";
    //kategori 
    //produk 
} elseif ($p == "produk_data") {
    $nav     = "Table produk";
    $ambil     = "mod_produk/$p.php";
} elseif ($p == "produk_create") {
    $nav     = "Buat produk";
    $ambil     = "mod_produk/$p.php";
} elseif ($p == "produk_edit") {
    $nav     = "produk Edit";
    $ambil     = "mod_produk/$p.php";
} elseif ($p == "produk_delete") {
    $nav     = "produk Delete";
    $ambil     = "mod_produk/$p.php";
} elseif ($p == "produk_proses") {
    $nav     = "produk Proses";
    $ambil     = "mod_produk/$p.php";
} elseif ($p == "edit_foto") {
    $nav     = "Edit Foto";
    $ambil     = "mod_produk/$p.php";
    //produk 
} else {
    $nav     = "Dashboard";
    $ambil     = "dashboard.php";
}
