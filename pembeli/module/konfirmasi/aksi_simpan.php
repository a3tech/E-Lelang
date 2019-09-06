<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$idpembeli = $_POST['id_pembeli'];
	$norek = $_POST['norek'];
	$atasnama = $_POST['atasnama'];
	$jenis = $_POST['jenis'];
	$keterangan = $_POST['keterangan'];
	$query= mysqli_query($koneksi,"select max(id_konfirm) as max_id from konfirmasi");
	$data=mysqli_fetch_array($query);
	$kodekonfirm= $data['max_id'];
	$noUrut=(int)substr($kodekonfirm, 2, 3);
	$noUrut++;
	$char="BI";
	$kodekonfirm=$char.sprintf("%03s", $noUrut);
	$querySimpan = mysqli_query($koneksi,"INSERT INTO konfirmasi(id_konfirm,jenis)VALUES ('$kodekonfirm','$jenis')");
	if($querySimpan){
		$querySimpan1 = mysqli_query($koneksi,"insert into detail_konfirmasi(id_konfirm, id_pembeli, atas_nama, no_rek, keterangan) values ('$kodekonfirm','$idpembeli', '$atasnama', '$norek', '$keterangan')");
	echo "<script> alert('Pesan Konfirmasi Top Up Saldo Berhasil Dikirim'); window.location = '$pesankonfirmasi_url'+'pembeli.php?';</script>";	
	}else{
		echo "<script> alert('Pesan Konfirmasi Top Up Saldo Gagal Dikirim'); window.location = '$pesankonfirmasi_url'+'pembeli.php?';</script>";	
	}
?>