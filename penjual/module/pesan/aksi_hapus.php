<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idPesan = $_GET['id_pesan'];
	$queryHapus = mysqli_query($koneksi,"DELETE FROM pesan WHERE id_pesan='$idPesan'");
	if($queryHapus){
		echo "<script> alert('Data Pesan Masuk Berhasil Dihapus'); window.location = '$pesanpenjual_url'+'module/pesan.php?';</script>";
	}else{
		echo "<script> alert('Data Pesan Masuk Gagal Dihapus'); window.location = '$pesanpenjual_url'+'module/pesan.php?';</script>";
	}

?>