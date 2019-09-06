<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
if (isset($_POST['save'])){

	$idinfo = $_POST['id_info'];
	$judul = $_POST['judul'];
	$info = $_POST['info'];
	$queryEdit = mysqli_query($koneksi,"UPDATE info SET judul='$judul', isi_informasi='$info' WHERE id_info='$idinfo'");

	if($queryEdit){
		echo "<script> alert('Data Bantuan Informasi Berhasil Diubah'); window.location = '$databantuan_url'+'bantuan.php?';</script>";
	}else{
		echo "<script> alert('Data Bantuan Informasi Gagal Diubah'); window.location = '$databantuan_url'+'bantuan_ubah.php?';</script>";
	}

}
?>