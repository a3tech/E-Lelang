<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idbarang= $_GET['id_barang'];
	$queryHapuss = mysqli_query($koneksi,"DELETE FROM komentar WHERE id_barang='$idbarang'");
	if($queryHapuss){
		$queryHapus = mysqli_query($koneksi,"DELETE FROM barang WHERE id_barang='$idbarang'");
		echo "<script> alert('Data Barang Lelang Berhasil Dihapus'); window.location = '$databarang_url'+'barang.php?';</script>";
	}else{
		echo "<script> alert('Data Barang Lelang Gagal Dihapus'); window.location = '$databarang_url'+'barang.php?';</script>";
	}

?>