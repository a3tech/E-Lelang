<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
if (isset($_POST['save'])){

	$idpenjual = $_POST['id_penjual'];
	$email = $_POST['email'];
	$atasnama = $_POST['atas_nama'];
	$norek= $_POST['norek'];
	$bank= $_POST['bank'];
	$alamat = $_POST['alamat'];
	$nohp = $_POST['nohp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$queryEdit = mysqli_query($koneksi,"UPDATE penjual SET atas_nama='$atasnama', no_rek='$norek', nama_bank='$bank', email='$email', alamat='$alamat', username='$username', password='$password', no_telp='$nohp' WHERE id_penjual='$idpenjual'");

	if($queryEdit){
		echo "<script> alert('Data Member Penjual Berhasil Diubah'); window.location = '$datapenjual_url'+'penjual.php?';</script>";
	}else{
		echo "<script> alert('Data Member Penjual Gagal Diubah'); window.location = '$datapenjual_url'+'penjual.php?';</script>";
	}

}
?>