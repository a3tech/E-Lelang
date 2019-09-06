<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$kd_barang = $_GET['kd_barang'];
	$queryHapus1 = mysqli_query($koneksi,"DELETE FROM komentar WHERE kd_barang='$kd_barang'");
	if($queryHapus1){
			$queryHapus = mysqli_query($koneksi,"DELETE FROM barang WHERE kd_barang='$kd_barang'");
		echo "<script> alert('Data Barang Lelang Berhasil Dihapus'); window.location = '$barang_url'+'penjual.php?';</script>";
	}else{
		echo "<script> alert('Data Barang Gagal Dihapus'); window.location = '$barang_url'+'penjual.php?';</script>";
	}

?>