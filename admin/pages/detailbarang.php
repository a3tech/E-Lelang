<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
     <?php
	include "../lib/config.php";
	include "../lib/koneksi.php";
	date_default_timezone_set('Asia/Jakarta');
	$tgl=date("Y-m-d H:i:s");
	$kd_barang=$_GET['kd_barang'];
$kueridetail = mysqli_query($koneksi,"select * from barang a join penjual b on a.id_penjual=b.id_penjual where a.kd_barang='$kd_barang'");
$hasilQuery=mysqli_fetch_array($kueridetail);
$id_penjual = $hasilQuery['id_penjual'];
$kd_barang = $hasilQuery['kd_barang'];
$nama = $hasilQuery['atas_nama'];
$email = $hasilQuery['email'];
$barang = $hasilQuery['nama_barang'];
$harga = $hasilQuery['harga'];
$kategori = $hasilQuery['kategori'];
$deskripsi = $hasilQuery['deskripsi'];
$bid = $hasilQuery['nominal_bid'];
$foto1 = $hasilQuery['foto_1'];
$foto2 = $hasilQuery['foto_2'];
$foto3 = $hasilQuery['foto_3'];
$tglberakhir = $hasilQuery['tanggal_berakhir'];
		?>
<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						<li data-thumb="../penjual/upload/<?php echo $foto1; ?>">
							<div class="thumb-image"> <img src="../penjual/upload/<?php echo $foto1; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
						<li data-thumb="../penjual/upload/<?php echo $foto2; ?>">
							 <div class="thumb-image"> <img src="../penjual/upload/<?php echo $foto2; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
						<li data-thumb="../penjual/upload/<?php echo $foto3; ?>">
						   <div class="thumb-image"> <img src="../penjual/upload/<?php echo $foto3; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li> 
					</ul>
				</div>
				<!-- flexslider -->
					<script defer src="../asset1/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="../asset1/css/flexslider.css" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
					<script src="../asset1/js/imagezoom.js"></script>
				<!-- //zooming-effect -->
			</div>

			<script>
			  
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $tglberakhir; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo?<?php echo $tglberakhir; ?>").innerHTML = days + "  Hari " + hours + "  Jam " + minutes + "  Menit " + seconds + "  Detik ";
   
    // If the count down is over, write some text 
    if (distance < 0) {

        clearInterval(x);

        window.location = "home.php";
    }
 

}, 1000);
 
</script>
<?php 
$queryyy= mysqli_query($koneksi,"select max(total) as total from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where a.kd_barang='$kd_barang'");
						$dataaa=mysqli_fetch_array($queryyy);
						$tertinggi = $dataaa['total']; 

			 $queryyyy= mysqli_query($koneksi,"select * from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where total='$tertinggi' AND a.kd_barang='$kd_barang'");
						$dataaaa=mysqli_fetch_array($queryyyy);
						$idbidding = $dataaaa['id_bidding'];
						$idpembeli = $dataaaa['id_pembeli'];
						$email1= $dataaaa['email'];

						if($tglberakhir<$tgl) { 
	$kueriupdate = mysqli_query($koneksi,"update barang set status='selesai' where tanggal_berakhir<'$tgl' "); 
	$kueriinsert = mysqli_query($koneksi,"insert into pemenang values('$idbidding', '$idpembeli','$tertinggi') "); } 
?>
			<div class="col-md-8 single-right">
				<h3><?php echo $kategori; ?></h3>
				<h3><?php echo $barang; ?></h3>
				<div class="description">
					<h5><i>Deskripsi</i></h5>
					<p><?php echo $deskripsi; ?></p>
				</div>
				<div class="color-quality">
					<div class="color-quality-left">
						<h5>Harga Awal : </h5>
						<h4>Rp <?php echo $harga; ?></h4>
						<h5>Batas Waktu Lelang : </h5>
						<h4 id="demo?<?php echo $tglberakhir; ?>"></h4>
					</div>
					<div class="color-quality-right">
						<h5>Minimal Penawaran :</h5>
						<h4>Rp <?php echo $bid; ?></h4>
						<h5>Email Penjual :</h5>
						<h4><?php echo $email; ?></h4>
					</div>
					<div class="clearfix"> </div>
				</div>
				 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> 

	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Penawar Tertinggi</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Komentar</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Daftar Penawaran</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span>Testimoni Penjual</span></li>
					</ul>	

			<?php 

	$queryyy= mysqli_query($koneksi,"select max(total) as total from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where a.kd_barang='$kd_barang'");
						$dataaa=mysqli_fetch_array($queryyy);
						$tertinggi = $dataaa['total']; 

			 $queryyyy= mysqli_query($koneksi,"select * from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where total='$tertinggi' AND a.kd_barang='$kd_barang'");
						$dataaaa=mysqli_fetch_array($queryyyy);
						$idbidding = $dataaaa['id_bidding'];
						$idpembeli = $dataaaa['id_pembeli'];
						$email1= $dataaaa['email'];
						$waktu = $dataaaa['tanggal'];

	?>

<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
					<div class="additional_info_sub_grids">
					<div class="col-xs-2 additional_info_sub_grid_left">
					<img src="../images/icon.png" alt=" " class="img-responsive" />
					</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
							<div class="additional_info_sub_grid_rightl">
	<a href="single.html">Email : <?php echo $email1; ?></a>
	<h5>Tanggal : <?php echo $waktu; ?></h5>
	<h5>Nominal Tertinggi : Rp <?php echo $tertinggi; ?></h5>
		</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
							</div>
						</div>
						
						<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<?php 
						$kd_barang=$_GET['kd_barang'];
  						$query2= mysqli_query($koneksi,"select * from komentar where kd_barang='$kd_barang'");
						while($data2=mysqli_fetch_array($query2)){
						?>

						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="../images/icon.png" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">

									<a href="single.html">Email : <?php
									echo $data2['email'] ?></a>
									<h5><?php echo $data2['tanggal']; ?></h5>
									<p><?php echo $data2['komen']; ?></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
	<?php } ?>
					</div> 
				

						<div class="tab-3 resp-tab-content additional_info_grid" aria-labelledby="tab_item-2">
							<?php 
  						$query= mysqli_query($koneksi,"select * from bidding a join barang b on a.kd_barang=b.kd_barang join pembeli c on a.id_pembeli=c.id_pembeli where a.kd_barang='$kd_barang'");
						while($data=mysqli_fetch_array($query)){
						?>
					<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">

								<img src="../images/icon.png" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
					
					
									<a href="#"> Email : <?php echo $data['email']?></a>
									<h5>Tanggal : <?php echo $data['tanggal']; ?></h5>
									<p>Jumlah Penawaran : Rp <?php echo $data['bid']+$harga ?></p> 
							
								
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
								<?php } ?>	
					</div>	

					<div class="tab-4 resp-tab-content additional_info_grid" aria-labelledby="tab_item-3">
						<?php 
  						$query2= mysqli_query($koneksi,"select * from feedback a join pembeli b on a.id_pembeli=b.id_pembeli where id_penjual='$id_penjual'");
						while($data2=mysqli_fetch_array($query2)){
						?>

						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="../images/icon.png" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">

									<a href="single.html">Email : <?php
									echo $data2['email'] ?></a>
									<h5><?php echo $data2['tanggal']; ?></h5>
									<p><?php echo $data2['pesan']; ?></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php } ?>
					</div> 	        					            	      
				</div>	
			</div>
			<script src="../asset1/js/easyResponsiveTabs.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab1').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});
			</script>
		</div>
	</div>
</body>
</html>