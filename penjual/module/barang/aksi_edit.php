<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
if (isset($_POST['save'])){

	$kd_barang = $_POST['kd_barang'];
	$nama = $_POST['nama'];
	$kategori = $_POST['kategori'];
	$harga = $_POST['harga'];
	$bid = $_POST['bid'];
	$tglberakhir = $_POST['tgl_berakhir'];
	$spesifikasi = $_POST['spesifikasi'];
	$queryEdit = mysqli_query($koneksi,"UPDATE barang SET nama_barang='$nama', harga='$harga', deskripsi='$spesifikasi', kategori='$kategori', nominal_bid='$bid', tanggal_berakhir='$tglberakhir' WHERE kd_barang='$kd_barang'");

	if($queryEdit){
		echo "<script> alert('Data Barang Lelang Berhasil Diubah'); window.location = '$barang_url'+'penjual.php?';</script>";	
		}else{
		echo "<script> alert('Data Barang Lelang Gagal Diubah'); window.location = '$barang_url'+'penjual_ubah.php?';</script>";	

}}
?>