<?php
 session_start();
 
 if(isset($_SESSION['user'])){
 
  $username = $_SESSION['user'];
  $password = $_SESSION['pass'];
  $email = $_SESSION['emaill'];
  $id_penjual = $_SESSION['id'];
 }else{
  header("location:../login.php");
 }
include "template/header.php";
include "pages/main.php";
include "template/footer.php";
?>