<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$idpembeli = $_POST['id_pembeli'];
	$emailpembeli = $_POST['emailpembeli'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$pesan = $_POST['pesan'];
	$tanggal = date("Y-m-d H:i:s");
	$querySimpan = mysqli_query($koneksi,"INSERT INTO pesan (id_pembeli, emailpenjual, emailpembeli, subject, pesan, tanggal_masuk) VALUES ('$idpembeli', '$email', '$emailpembeli', '$subject', '$pesan', '$tanggal')");
	if($querySimpan){
	echo "<script> alert('Pesan Privat Berhasil Dikirim'); window.location = '$pesanpembeli_url'+'pembeli.php?';</script>";	
	}else{
		echo "<script> alert('Pesan Privat Gagal Dikirim'); window.location = '$pesanpembeli_url'+'pembeli.php?';</script>";	
	}
?>