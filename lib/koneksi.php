<?php
//definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "elelang";

$koneksi = mysqli_connect($server, $username, $password) or die("Koneksi Gagal !");
mysqli_select_db($koneksi, $database) or die ("Database Tidak Bisa Dibuka");
?>