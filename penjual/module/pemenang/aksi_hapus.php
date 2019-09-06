<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idbidding = $_GET['id_bidding'];
	$queryHapus = mysqli_query($koneksi,"DELETE FROM bidding WHERE id_bidding='$idbidding'");
	if($queryHapus){
		echo "<script> alert('Data Pemenang Berhasil Dihapus'); window.location = '$pemenangpj_url'+'pemenang.php?';</script>";
	}else{
		echo "<script> alert('Data Pemenang Gagal Dihapus'); window.location = '$pemenangpj_url'+'pemenang.php?';</script>";
	}

?>