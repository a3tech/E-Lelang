<?php
session_start();
if(isset($_SESSION['username'])){
 
 header("location:admin/admin.php");
}elseif(isset($_SESSION['user'])){
	header("location:penjual/penjual.php");
}
elseif(isset($_SESSION['userr'])){
	header("location:pembeli/pembeli.php");
}
include "template/header1.php";
include "pages/login.php";
include "template/footer.php";
?>