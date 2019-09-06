<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$idadmin= $_POST['id_admin'];
	$idinfo = $_POST['idinfo'];
	$judul = $_POST['judul'];
	$info = $_POST['info'];
	$querySimpan = mysqli_query($koneksi,"INSERT INTO info (id_info, id_admin, judul, isi_informasi) VALUES ('$idinfo', '$idadmin', '$judul', '$info')");
	if($querySimpan){
	echo "<script> alert('Data Bantuan Informasi Berhasil Disimpan'); window.location = '$databantuan_url'+'bantuan.php?';</script>";	
	}else{
		echo "<script> alert('Data Bantuan Informasi Gagal Disimpan'); window.location = '$databantuan_url'+'bantuan.php?';</script>";	
	}
?>