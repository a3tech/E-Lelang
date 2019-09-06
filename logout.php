<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['user']);
unset($_SESSION['pass']);
unset($_SESSION['userr']);
unset($_SESSION['passs']);
include "template/header1.php";
include "pages/login.php";
include "template/footer.php";
?>