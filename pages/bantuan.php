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
	include "lib/config.php";
	include "lib/koneksi.php";
	$kueribantuann = mysqli_query($koneksi,"select * from info where id_info='I0001' ");
	$bantuann=mysqli_fetch_array($kueribantuann)
		?>
			<h4 align="justify"><?php echo $bantuann['judul'];?></h4>
			<p class="para" align="justify"><?php echo $bantuann['isi_informasi'];?></p>
		</div>
		<div class="left_sidebar">
					<div class="sellers">
						<h4>Bantuan</h4>
						<div class="single-nav">
			                <ul>
	 <?php
	include "lib/config.php";
	include "lib/koneksi.php";
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