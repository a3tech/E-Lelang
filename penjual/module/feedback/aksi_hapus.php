<?php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_feedback = $_GET['id_feedback'];
	$queryHapus = mysqli_query($koneksi,"DELETE FROM feedback WHERE id_feedback='$id_feedback'");
	if($queryHapus){
		echo "<script> alert('Data Feedback Barhasil Dihapus'); window.location = '$feedback_url'+'feedback.php?';</script>";
	}else{
		echo "<script> alert('Data Feedback Gagal Dihapus'); window.location = '$feedback_url'+'feedback.php?';</script>";
	}

?>