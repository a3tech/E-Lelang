<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
     <?php
	include "../lib/config.php";
	include "../lib/koneksi.php";
	$kd_barang=$_GET['kd_barang'];
$kueridetail = mysqli_query($koneksi,"select * from barang a join penjual b on a.id_penjual=b.id_penjual where a.kd_barang='$kd_barang'");
$hasilQuery=mysqli_fetch_array($kueridetail);
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
					</div>
					<div class="color-quality-right">
						<h5>Minimal Penawaran :</h5>
						<h4>Rp <?php echo $bid; ?></h4>


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
					</ul>	

					<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
					<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="../images/t1.png" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
							<div class="additional_info_sub_grid_rightl">
					<form method="post">
								<?php 
					if (isset($_POST['tawar'])){ 
						$email = $_POST['email'];
						$jaminan = $_POST['jaminan'];
						$kd_barang=$_POST['kd_barang']; 
						$jumlah=$_POST['penawar'];
						$total = $harga+$jumlah;
 					    $query= mysqli_query($koneksi,"select * from pembeli where email='$email'");
						$data=mysqli_fetch_array($query);
						$id_pembeli = $data['id_pembeli'];
						$saldo = $data['saldo'];
						$emailpb = $data['email'];

						$kuery= mysqli_query($koneksi,"select * from barang where kd_barang='$kd_barang'");
						$dataa=mysqli_fetch_array($kuery);
						$bid = $dataa['nominal_bid'];
						if($jaminan==$saldo && $jumlah>=$bid && $email==$emailpb){

						$queryy= mysqli_query($koneksi,"select max(id_bidding) as max_id from bidding");
	$dataa=mysqli_fetch_array($queryy);
	$kodekonfirm= $dataa['max_id'];
	$noUrut=(int)substr($kodekonfirm, 3, 3);
	$noUrut++;
	$char="BD";
	$kodekonfirm=$char.sprintf("%03s", $noUrut);
					
 			$querySimpan = mysqli_query($koneksi,"INSERT INTO bidding (id_bidding,id_pembeli,kd_barang, bid, total) VALUES ('$kodekonfirm', '$id_pembeli','$kd_barang', '$jumlah', '$total')");
 				if($querySimpan){

			 $queryyy= mysqli_query($koneksi,"select max(total) as total from bidding a join pembeli b on a.id_pembeli=b.id_pembeli");
						$dataaa=mysqli_fetch_array($queryyy);
						$tertinggi = $dataaa['total']; 


			 $queryyyy= mysqli_query($koneksi,"select * from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where total='$tertinggi'");
						$dataaaa=mysqli_fetch_array($queryyyy);
						$email1= $dataaaa['email'];
				
				}
						?>
						<a href="single.html">Email : <?php echo $email1; ?></a>
									<h5>Oct 06, 2016.</h5>
									<h5>Jumlah Penawaran : Rp <?php echo $harga+$jumlah; ?></h5>
									<h5>Nominal Penawaran : Rp <?php echo $tertinggi; ?></h5>
										<?php } elseif($jaminan!==$saldo){} }  ?>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
											<img src="../images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
									<div class="review_grids">
							<h5>Form Penawaran</h5>
								<input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
								<input type="text" name="email" placeholder="Email" required="required"><br/><br/>
								<input type="text" name="jaminan" placeholder="Uang Jaminan" required="required"><br/><br/>
							<input type="text" name="penawar" placeholder="Nominal Penawaran"  required="required"><br/><br/>
								<input type="submit" name="tawar" value="Tawar" >
								</form>
						</div>
						</div>
					</div>	
						
								<form  method="post">
								<?php 
					if (isset($_POST['komentar'])){ 
						$email = $_POST['email'];
						$komentar = $_POST['komen'];
						$username = $_POST['username'];
						$kd_barang=$_POST['kd_barang'];
						$tanggal = date("Y-m-d H:i:s"); 
 					    $query= mysqli_query($koneksi,"select * from pembeli where email='$email'");
						$data=mysqli_fetch_array($query);
						$idpembeli = $data['id_pembeli'];
						$emailpb = $data['email'];
						$user = $data['username'];
						if($email==$emailpb && $username==$user){
						$querySimpan = mysqli_query($koneksi,"INSERT INTO komentar (kd_barang, id_pembeli, email, komen, tanggal) VALUES ('$kd_barang', '$idpembeli','$emailpb', '$komentar', '$tanggal')");
				
				} else {
						$query1= mysqli_query($koneksi,"select * from penjual where email='$email'");
						$data1=mysqli_fetch_array($query1);
						$idpenjual = $data1['id_penjual'];
						$emailpj = $data1['email'];
						$user = $data1['username'];
						if($email==$emailpj && $username==$user){
 			$querySimpan = mysqli_query($koneksi,"INSERT INTO komentar (kd_barang, id_penjual, email, komen, tanggal) VALUES ('$kd_barang', '$idpenjual', '$emailpj','$komentar', '$tanggal')");
				}else {} }
				}
						?>
					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<?php 
						$kd_barang=$_GET['kd_barang'];
  						$query2= mysqli_query($koneksi,"select * from komentar where kd_barang='$kd_barang'");
						while($data2=mysqli_fetch_array($query2)){
						?>

						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="../images/t2.png" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">

									<a href="single.html">Email : <?php
									echo $data2['email'] ?></a>
									<h5><?php echo $data2['tanggal']; ?></h5>
									<p><?php echo $data2['komen']; ?></p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
											<img src="../images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php } ?>
						<div class="review_grids">
							<h5>Tambahkan Komentar</h5>
						<input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
								<input type="text" name="email" placeholder="Email" required="required"><br/><br/>
								<input type="text" name="username" placeholder="Username" required="required"><br/><br/>
								<textarea name="komen" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="required" placeholder="Tulis Komentar"></textarea>
								<input type="submit" name="komentar" value="Submit" >
							</form>
						</div>
					</div> 

						<div class="tab-3 resp-tab-content additional_info_grid" aria-labelledby="tab_item-2">
							<?php 
  						$query= mysqli_query($koneksi,"select * from bidding a join barang b on a.kd_barang=b.kd_barang join pembeli c on a.id_pembeli=c.id_pembeli where a.kd_barang='$kd_barang'");
						while($data=mysqli_fetch_array($query)){
						?>
					<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">

								<img src="../images/t1.png" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
					
					
									<a href="#"> Email : <?php echo $data['email']?></a>
									<h5>Oct 06, 2016.</h5>
									<p>Jumlah Penawaran : Rp <?php echo $data['bid']+$harga ?></p> 
							
								
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
											<img src="../images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="../images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
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