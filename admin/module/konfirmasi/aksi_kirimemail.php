<?php
$name=$_POST['nama'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['pesan'];

$to=$email;

$message="From:$name <br />".$message;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: E-Lelang<noreply@e-lelang.com>'."\r\n" . 'Reply-To: '.$name.' <'.$email.'>'."\r\n";
$headers .= 'Cc: admin@e-lelang.com' . "\r\n"; //untuk cc lebih dari satu tinggal kasih koma
@mail($to,$subject,$message,$headers);
if(@mail)
{
echo "<script> alert('Email Berhasil Dikirim'); window.location = '$dataadmin_url'+'konfirmasi.php?';</script>";		
}
?>