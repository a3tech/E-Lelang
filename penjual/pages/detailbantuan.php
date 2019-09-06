<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- start main -->
<div class="main_bg">
<div class="wrap">	
	<div class="main">
	<!-- start service -->
	  <div class="service">

		<div class="ser-main">
		<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$id_info=$_GET['id_info'];
$queryTampil=mysqli_query($koneksi,"SELECT * FROM info WHERE id_info='$id_info'");
$hasilQuery=mysqli_fetch_array($queryTampil);
$id_info = $hasilQuery['id_info'];
$judul = $hasilQuery['judul'];
$isi = $hasilQuery['isi_informasi'];
?>
			<h4 align="justify"><?php echo $judul; ?></h4>
			<p class="para" align="justify"><?php echo $isi; ?></p>
		</div>
		<div class="left_sidebar">
					<div class="sellers">
						<h4>Bantuan</h4>
						<div class="single-nav">
			                <ul>
	 <?php
	include "../lib/config.php";
	include "../lib/koneksi.php";
	$kueribantuan = mysqli_query($koneksi,"select * from info ");
	while($bantuan=mysqli_fetch_array($kueribantuan)){
		?>
			                   <li><a href="detailbantuan.php?id_info=<?php echo $bantuan['id_info'];?>"><?php echo $bantuan['judul'];?></li>
			<?php } ?>		                    
			                </ul>
			              </div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
	</div>
</div>
</div>		
</body>
</html>