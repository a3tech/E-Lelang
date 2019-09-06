<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
if (isset($_POST['save'])){

	$idpembeli = $_POST['id_pembeli'];
	$email = $_POST['email'];
	$atasnama = $_POST['atas_nama'];
	$norek= $_POST['norek'];
	$bank= $_POST['bank'];
	$alamat = $_POST['alamat'];
	$nohp = $_POST['nohp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$saldo = $_POST["saldo"];
	$queryEdit = mysqli_query($koneksi,"UPDATE pembeli SET atas_nama='$atasnama', no_rek='$norek', nama_bank='$bank', email='$email', alamat='$alamat', username='$username', password='$password', no_telp='$nohp', saldo='$saldo' WHERE id_pembeli='$idpembeli'");

	if($queryEdit){
		echo "<script> alert('Data Member Pembeli Berhasil Diubah'); window.location = '$datapembeli_url'+'pembeli.php?';</script>";
	}else{
		echo "<script> alert('Data Member Pembeli Gagal Diubah'); window.location = '$datapembeli_url'+'pembeli.php?';</script>";
	}

}
?>