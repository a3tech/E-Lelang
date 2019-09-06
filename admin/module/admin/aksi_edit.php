<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
if (isset($_POST['save'])){

	$idadmin = $_POST['id_admin'];
	$nama = $_POST['nama'];
	$nohp = $_POST['no_hp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$queryEdit = mysqli_query($koneksi,"UPDATE admin SET nama_admin='$nama', no_hp='$nohp', username='$username', password='$password' WHERE id_admin='$idadmin'");

	if($queryEdit){
		echo "<script> alert('Data Admin Berhasil Diubah'); window.location = '$dataadmin_url'+'admin.php?';</script>";
	}else{
		echo "<script> alert('Data Admin Gagal Diubah'); window.location = '$dataadmin_url'+'admin_ubah.php?';</script>";
	}

}
?>