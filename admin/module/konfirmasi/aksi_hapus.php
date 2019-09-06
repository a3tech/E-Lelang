<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idkonfirm= $_GET['id_konfirm'];
	$queryHapuss = mysqli_query($koneksi,"DELETE FROM detail_konfirmasi WHERE id_konfirm='$idkonfirm'");
	if($queryHapuss){
		$queryHapus = mysqli_query($koneksi,"DELETE FROM konfirmasi WHERE id_konfirm='$idkonfirm'");
		echo "<script> alert('Data Konfirmasi Berhasil Dihapus'); window.location = '$datakonfirmasi_url'+'konfirmasi.php?';</script>";
	}else{
		echo "<script> alert('Data Konfirmasi Gagal Dihapus'); window.location = '$datakonfirmasi_url'+'konfirmasi.php?';</script>";
	}

?>