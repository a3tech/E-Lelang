<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idpembeli= $_GET['id_pembeli'];
	$queryHapuss = mysqli_query($koneksi,"DELETE FROM pesan WHERE id_pembeli='$idpembeli'");
	if($queryHapuss){
		$queryHapus = mysqli_query($koneksi,"DELETE FROM pembeli WHERE id_pembeli='$idpembeli'");
		echo "<script> alert('Data Member Pembeli Berhasil Dihapus'); window.location = '$datapembeli_url'+'pembeli.php?';</script>";
	}else{
		echo "<script> alert('Data Member Pembeli Gagal Dihapus'); window.location = '$datapembeli_url'+'pembeli.php?';</script>";
	}

?>