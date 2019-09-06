<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$id_pembeli= $_POST['id_pembeli'];
	$saldo= $_POST['saldo'];
	$querySimpan = mysqli_query($koneksi,"UPDATE pembeli set saldo='$saldo' where id_pembeli='$id_pembeli'");
	if($querySimpan){
	echo "<script> alert('Saldo Jaminan Berhasil Dikirim'); window.location = '$datakonfirmasi_url'+'konfirmasi.php?';</script>";	
	}else{
		echo "<script> alert('Saldo Jaminan Berhasil Dikirim'); window.location = '$datakonfirmasi_url'+'konfirmasi.php?';</script>";	
	}
?>