<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idinfo = $_GET['id_info'];
	$queryHapus = mysqli_query($koneksi,"DELETE FROM info WHERE id_info='$idinfo'");
	if($queryHapus){
		echo "<script> alert('Data Bantuan Informasi Berhasil Dihapus'); window.location = '$databantuan_url'+'bantuan.php?';</script>";
	}else{
		echo "<script> alert('Data Bantuan Informasi Gagal Dihapus'); window.location = '$databantuan_url'+'bantuan.php?';</script>";
	}

?>