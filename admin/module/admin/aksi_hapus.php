<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idadmin = $_GET['id_admin'];
	$queryHapus = mysqli_query($koneksi,"DELETE FROM admin WHERE id_admin='$idadmin'");
	if($queryHapus){
		echo "<script> alert('Data Admin Berhasil Dihapus'); window.location = '$dataadmin_url'+'admin.php?';</script>";
	}else{
		echo "<script> alert('Data Admin Gagal Dihapus'); window.location = '$dataadmin_url'+'admin.php?';</script>";
	}

?>