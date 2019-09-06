<?php
 session_start();
 
 if(isset($_SESSION['username'])){
 
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  $id = $_SESSION['id_admin'];
 }else{
  header("location:../login.php");
 }
include "template/header.php";
include "pages/main.php";
include "template/footer.php";
?>