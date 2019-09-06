<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$idadmin= $_POST['idadmin'];
	$nama = $_POST['nama'];
	$nohp = $_POST['no_hp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$querySimpan = mysqli_query($koneksi,"INSERT INTO admin (id_admin, nama_admin, no_hp, username, password) VALUES ('$idadmin', '$nama', '$nohp', '$username', '$password')");
	if($querySimpan){
	echo "<script> alert('Data Admin Baru Berhasil Disimpan'); window.location = '$dataadmin_url'+'admin.php?';</script>";	
	}else{
		echo "<script> alert('Data Admin Baru Gagal Disimpan'); window.location = '$dataadmin_url'+'admin_tambah.php?';</script>";	
	}
?>