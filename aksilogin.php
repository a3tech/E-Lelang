<?php
include "lib/koneksi.php";
$username = $_POST["username"];
$pass = $_POST["password"];

if(!ctype_alnum($username) OR !ctype_alnum($pass)){
	echo "<center>Login Gagal! <br>
	Username atau Password Anda Tidak Benar.<br>
	Atau account Anda sedang diblokir.<br>";
echo "<a href=login.php><b>Ulang Lagi</b></a></center>";
}else{
	$login = mysqli_query($koneksi,"SELECT * FROM admin where username='$username' and password='$pass' ");
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);

if ($ketemu > 0){
	session_start();

	$_SESSION['username'] = $r['username'];
	$_SESSION['password'] = $r['password'];
	$_SESSION['id_admin'] = $r['id_admin'];
	header('location:admin/admin.php?module=home');

}else{
$login = mysqli_query($koneksi,"SELECT * FROM penjual where username='$username' and (password='$pass' and profesi='penjual') ");
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);

if ($ketemu > 0){
	session_start();

	$_SESSION['emaill'] = $r['email'];
	$_SESSION['user'] = $r['username'];
	$_SESSION['pass'] = $r['password'];
	$_SESSION['id'] = $r['id_penjual'];
	header('location:penjual/penjual.php?module=home');
}else{
$login = mysqli_query($koneksi,"SELECT * FROM pembeli where username='$username' and (password='$pass' and profesi='pembeli') ");
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);

if ($ketemu > 0){
	session_start();

	$_SESSION['email'] = $r['email'];
	$_SESSION['saldo'] = $r['saldo'];
	$_SESSION['userr'] = $r['username'];
	$_SESSION['passs'] = $r['password'];
	$_SESSION['id'] = $r['id_pembeli'];

	header('location:pembeli/pembeli.php?module=home');
}

else{
	echo "<center>LOGIN GAGAL! <br>
	Username atau Password Anda Tidak Benar. <br>
	Atau account Anda sedang diblokir.<br>";
	echo "<a href=login.php><b>ULANGI LAGI</b></a></center>";
}
}}}
?>