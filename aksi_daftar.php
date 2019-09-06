<?php
	include "lib/config.php";
	include "lib/koneksi.php";


	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$norekening = $_POST['norekening'];
	$atasnama = $_POST['atasnama'];
	$bank = $_POST['bank'];
	$nohp = $_POST['nohp'];
	$profesi = $_POST['profesi'];
	$alamat = $_POST['alamat'];


	if(empty($username) or empty($password)){

		echo "<script>alert('Form Tidak Boleh Kosong !!! Silahkan Ulangi Lagi...'); window.location=('daftar.php') </script>";
	}else{
	if($profesi!=='Pembeli'){
		$pass = md5($_POST['password']);
		$querySimpan = mysqli_query($koneksi,"INSERT INTO penjual (atas_nama, no_rek, nama_bank, email, alamat, username, password, no_telp, profesi) VALUES ('$atasnama', '$norekening', '$bank', '$email', '$alamat', '$username', '$password', '$nohp', '$profesi')");
			echo "<script> alert('Data Member Penjual Berhasil Didaftarkan'); window.location = '$regis_url'+'login.php?';</script>";
	}elseif($profesi!=='Penjual'){
		$pass = md5($_POST['password']);
		$querySimpan = mysqli_query($koneksi,"INSERT INTO pembeli (atas_nama, no_rek, nama_bank, email, alamat, username, password, no_telp, profesi) VALUES ('$atasnama', '$norekening', '$bank', '$email', '$alamat', '$username', '$password', '$nohp', '$profesi')");
		echo "<script> alert('Data Member Pembeli Berhasil Didaftarkan'); window.location = '$regis_url'+'login.php?';</script>";
	}else{
		echo "<script> alert('Data Member Gagal Didaftarkan'); window.location = '$regis_url'+'daftar.php?';</script>";	
	}
	}
?>