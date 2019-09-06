<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$idpenjual = $_POST['id_penjual'];
	$nama = $_POST['nama'];
	$kategori = $_POST['kategori'];
	$harga = $_POST['harga'];
	$bid = $_POST['bid'];
	$tglberakhir = $_POST['tgl_berakhir'];
	$spesifikasi = $_POST['spesifikasi'];
	$jumlah = count($_FILES['gambar']['name']);
	if ($jumlah > 0) {
		$gambar = array();
	for ($i=0; $i < $jumlah; $i++) { 
	$nama_file = $_FILES['gambar']['name'][$i];
	$tmp_file = $_FILES['gambar']['tmp_name'][$i];
	$path="../../upload/".$nama_file;
	$gambar[$i] = $nama_file;
	move_uploaded_file($tmp_file, $path);
	}
				
	$querySimpan = mysqli_query($koneksi,"INSERT INTO barang(id_penjual, nama_barang, harga, deskripsi, kategori, nominal_bid, tanggal_berakhir, status,foto_1, foto_2, foto_3) VALUES ('$idpenjual','$nama', '$harga', '$spesifikasi', '$kategori', '$bid','$tglberakhir', 'mulai','$gambar[0]', '$gambar[1]', '$gambar[2]')");
		echo "<script> alert('Barang Berhasil Dilelang'); window.location = '$barang_url'+'penjual.php?';</script>";	
		}else{
		echo "<script> alert('Barang Gagal Dilelang'); window.location = '$barang_url'+'penjual.php?';</script>";	
	}
?>