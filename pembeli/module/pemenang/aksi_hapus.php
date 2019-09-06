<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idbidding = $_GET['id_bidding'];
	$queryHapus = mysqli_query($koneksi,"DELETE FROM pemenang WHERE id_bidding='$idbidding'");
	if($queryHapus){
	$queryHapus1 = mysqli_query($koneksi,"DELETE FROM bidding WHERE id_bidding='$idbidding'");
		echo "<script> alert('Data Pemenang Berhasil Dihapus'); window.location = '$pemenangpb_url'+'pemenang.php?';</script>";
	}else{
		echo "<script> alert('Data Pemenang Gagal Dihapus'); window.location = '$pemenangpb_url'+'pemenang.php?';</script>";
	}

?>