<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$idpenjual = $_POST['id_penjual'];
	$emailpenjual = $_POST['emailpenjual'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$pesan = $_POST['pesan'];
	$tanggal = date("Y-m-d H:i:s");
	$querySimpan = mysqli_query($koneksi,"INSERT INTO pesan (id_penjual, emailpenjual, emailpembeli, subject, pesan, tanggal_masuk) VALUES ('$idpenjual', '$emailpenjual', '$email', '$subject', '$pesan', '$tanggal')");
	if($querySimpan){
	echo "<script> alert('Pesan Privat Berhasil Dikirim'); window.location = '$pesanpenjual_url'+'penjual.php?';</script>";	
	}else{
		echo "<script> alert('Pesan Privat Gagal Dikirim'); window.location = '$pesanpenjual_url'+'penjual.php?';</script>";	
	}
?>