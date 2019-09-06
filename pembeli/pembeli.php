<?php
 session_start();
 
 if(isset($_SESSION['userr'])){
 
  $username = $_SESSION['userr'];
  $password = $_SESSION['passs'];
  $saldo = $_SESSION['saldo'];
  $email = $_SESSION['email'];
  $id = $_SESSION['id'];
 }else{
  header("location:../login.php");
 }
include "template/header.php";
include "pages/main.php";
include "template/footer.php";
?>