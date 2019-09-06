<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idpenjual = $_GET['id_penjual'];
	$queryHapuss = mysqli_query($koneksi,"DELETE FROM pesan WHERE id_penjual='$idpenjual'");
	if($queryHapuss){
		$queryHapus = mysqli_query($koneksi,"DELETE FROM penjual WHERE id_penjual='$idpenjual'");
		echo "<script> alert('Data Penjual Berhasil Dihapus'); window.location = '$datapenjual_url'+'penjual.php?';</script>";
	}else{
		echo "<script> alert('Data Penjual Gagal Dihapus'); window.location = '$datapenjual_url'+'penjual.php?';</script>";
	}

?>