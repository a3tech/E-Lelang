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
<form method="post">
				<?php 
					if (isset($_POST['tawar'])){ 
						$tanggal = date("Y-m-d H:i:s"); 
						$emailpembeli = $_SESSION['email'];
						$id = $_SESSION['id'];
						$saldo = $_SESSION['saldo'];
						$kd_barang=$_POST['kd_barang']; 
						$jumlah=$_POST['penawar'];
						$total=$harga+$jumlah;
 					    $query= mysqli_query($koneksi,"select * from pembeli where email='$emailpembeli'");
						$data=mysqli_fetch_array($query);
						$id_pembeli = $data['id_pembeli'];
						$saldo = $data['saldo'];
						$emailpb = $data['email'];

						$kuery= mysqli_query($koneksi,"select * from barang where kd_barang='$kd_barang'");
						$dataa=mysqli_fetch_array($kuery);
						$bid = $dataa['nominal_bid'];
						if($jaminan==$saldo && $jumlah>=$bid && $emailpembeli==$emailpb){

						$queryy= mysqli_query($koneksi,"select max(id_bidding) as max_id from bidding");
	$dataa=mysqli_fetch_array($queryy);
	$kodekonfirm= $dataa['max_id'];
	$noUrut=(int)substr($kodekonfirm, 3, 3);
	$noUrut++;
	$char="BD";
	$kodekonfirm=$char.sprintf("%03s", $noUrut);
					
 			$querySimpan = mysqli_query($koneksi,"INSERT INTO bidding (id_bidding,id_pembeli,kd_barang, id_penjual, tanggal,bid, total) VALUES ('$kodekonfirm', '$id','$kd_barang', '$id_penjual', '$tanggal','$jumlah', '$total')");
				

	$queryyy= mysqli_query($koneksi,"select max(total) as total from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where a.kd_barang='$kd_barang'");
						$dataaa=mysqli_fetch_array($queryyy);
						$tertinggi = $dataaa['total']; 

			 $queryyyy= mysqli_query($koneksi,"select * from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where total='$tertinggi' AND a.kd_barang='$kd_barang'");
						$dataaaa=mysqli_fetch_array($queryyyy);
						$email1= $dataaaa['email'];
						$tanggall = $dataaaa['tanggal'];
						
	?>

<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
					<div class="additional_info_sub_grids">
					<div class="col-xs-2 additional_info_sub_grid_left">
					<img src="../images/icon.png" alt=" " class="img-responsive" />
					</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
							<div class="additional_info_sub_grid_rightl">
	<a href="single.html">Email : <?php echo $email1; ?></a>
	<h5>Tanggal : <?php echo $tanggall; ?></h5>
	<h5>Nominal Tertinggi : Rp <?php echo $tertinggi; ?></h5>
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
							<div class="review_grids">
							<h5>Form Penawaran</h5>
								<input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
							<input type="text" name="penawar" placeholder="Nominal Penawaran"  required="required"><br/><br/>
								<input type="submit" name="tawar" value="Tawar" >
							
						</div>
						</div>
						<?php } else {?>
<?php 
$queryyy= mysqli_query($koneksi,"select max(total) as total from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where a.kd_barang='$kd_barang'");
						$dataaa=mysqli_fetch_array($queryyy);
						$tertinggi = $dataaa['total']; 

			 $queryyyy= mysqli_query($koneksi,"select * from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where total='$tertinggi' AND a.kd_barang='$kd_barang'");
						$dataaaa=mysqli_fetch_array($queryyyy);
						$email1= $dataaaa['email'];
						?>

						<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
<div class="additional_info_sub_grids">
<div class="col-xs-2 additional_info_sub_grid_left">
<img src="../images/icon.png" alt=" " class="img-responsive" />
</div>
<div class="col-xs-10 additional_info_sub_grid_right">
<div class="additional_info_sub_grid_rightl">
	<a href="single.html">Email : <?php echo $email1; ?></a>
	<h5>Oct 06, 2016.</h5>
	<h5>Nominal Tertinggi : Rp <?php echo $tertinggi; ?></h5>
</div>
<div class="additional_info_sub_grid_rightr">
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>						
								<div class="review_grids">
							<h5>Form Penawaran</h5>
								<input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
							<input type="text" name="penawar" placeholder="Nominal Penawaran"  required="required"><br/><br/>
								<input type="submit" name="tawar" value="Tawar" >
								
						</div>
						</div>	
						
<?php } } else { ?>
<?php 

$queryyy= mysqli_query($koneksi,"select max(total) as total from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where a.kd_barang='$kd_barang'");
						$dataaa=mysqli_fetch_array($queryyy);
						$tertinggi = $dataaa['total']; 

			 $queryyyy= mysqli_query($koneksi,"select * from bidding a join pembeli b on a.id_pembeli=b.id_pembeli where total='$tertinggi' AND a.kd_barang='$kd_barang'");
						$dataaaa=mysqli_fetch_array($queryyyy);
						$idbidding = $dataaaa['id_bidding'];
						$idpembeli = $dataaaa['id_pembeli'];
						$email1= $dataaaa['email'];

						?>

<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
<div class="additional_info_sub_grids">
<div class="col-xs-2 additional_info_sub_grid_left">
<img src="../images/icon.png" alt=" " class="img-responsive" />
</div>
<div class="col-xs-10 additional_info_sub_grid_right">
<div class="additional_info_sub_grid_rightl">
	<a href="single.html">Email : <?php echo $email1; ?></a>
	<h5>Oct 06, 2016.</h5>
	<h5>Nominal Tertinggi : Rp <?php echo $tertinggi; ?></h5>
</div>
<div class="additional_info_sub_grid_rightr">
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>						
								<div class="review_grids">
							<h5>Form Penawaran</h5>
								<input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
							<input type="text" name="penawar" placeholder="Nominal Penawaran"  required="required"><br/><br/>
								<input type="submit" name="tawar" value="Tawar" >
								
						</div>
						</div>	
						<?php } ?>
						</form>
					<form  method="post">
					<?php 
					if (isset($_POST['komentar'])){ 
						$komentar = $_POST['komen'];
						$kd_barang=$_POST['kd_barang'];
						$tanggal = date("Y-m-d H:i:s"); 
						if ($_SESSION['email']){
						$email = $_SESSION['email'];
 					    $query= mysqli_query($koneksi,"select * from pembeli where email='$email'");
						$data=mysqli_fetch_array($query);
						$idpembeli = $data['id_pembeli'];
						$emailpb = $data['email'];
						if($_SESSION['email']==$emailpb){
						$querySimpan = mysqli_query($koneksi,"INSERT INTO komentar (kd_barang, id_pembeli, email, komen, tanggal) VALUES ('$kd_barang', '$idpembeli','$emailpb', '$komentar', '$tanggal')");
				
				} }
						?>
						<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<?php 
						$kd_barang=$_GET['kd_barang'];
  						$email2= $_SESSION['email'];
  						$query2= mysqli_query($koneksi,"select * from komentar where kd_barang='$kd_barang' and email!='$email2'");
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
		<?php	 $semail = $_SESSION['email'];
						 $query= mysqli_query($koneksi,"select * from komentar where kd_barang='$kd_barang' and email='$semail'");
						while($data=mysqli_fetch_array($query)){
						$email1 = $data['email'];
				if($_SESSION['email']==$email1) { ?>
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">Email : <?php
									echo $data['email'] ?></a>
									<h5><?php echo $data['tanggal']; ?></h5>
									<p><?php echo $data['komen']; ?></p>
							</div>
						
								<div class="additional_info_sub_grid_rightr">
				
									<div class="rating">
										<div class="rating-left">
								<li class="nav-item">
              <a class="nav-link" href="home.php?id_komentar=<?php echo $data['id_komentar'];?>">
                <i class="nav-icon fa fa-trash"></i></a>
           				 </li>

			<li class="nav-item">
              <a class="nav-link" href="#">
                <i class="nav-icon fa fa-cog"></i></a>
           				 </li>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
					<?php } } ?>
								<div class="clearfix"> </div>
							</div>
	
					<?php  }
						if(isset($_GET['id_komentar'])){ 
					$id_komentar= $_GET['id_komentar'];
	  $kueribarang = mysqli_query($koneksi,"delete from komentar where id_komentar='$id_komentar'"); } ?>
			
						<div class="review_grids">
							<h5>Tambahkan Komentar</h5>
						<input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
								<textarea name="komen" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="required" placeholder="Tulis Komentar"></textarea>
								<input type="submit" name="komentar" value="Komentari" >
						
						</div>
					</div> 
</div>
					<?php } else { ?>
					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<?php 
						$kd_barang=$_GET['kd_barang'];
						$email2= $_SESSION['email'];
  						$query2= mysqli_query($koneksi,"select * from komentar where kd_barang='$kd_barang' and email!='$email2'");
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
							
		<?php	
		 $semail = $_SESSION['email'];
						 $query= mysqli_query($koneksi,"select * from komentar a join pembeli b on a.email=b.email where kd_barang='$kd_barang' and a.email='$semail'");
						while($data=mysqli_fetch_array($query)){
						$email1 = $data['email'];
				if($_SESSION['email']==$email1) { ?>
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">Email : <?php
									echo $data['email'] ?></a>
									<h5><?php echo $data['tanggal']; ?></h5>
									<p><?php echo $data['komen']; ?></p>
							</div>
						
								<div class="additional_info_sub_grid_rightr">
				
									<div class="rating">
										<div class="rating-left">
								<li class="nav-item">
              <a class="nav-link" href="home.php?id_komentar=<?php echo $data['id_komentar'];?>">
                <i class="nav-icon fa fa-trash"></i></a>
           				 </li>

			<li class="nav-item">
              <a class="nav-link" href="#">
                <i class="nav-icon fa fa-cog"></i></a>
           				 </li>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
					<?php  } } ?>

					<div class="clearfix"> </div>
							</div>
					<?php   }
						if(isset($_GET['id_komentar'])){ 
					$id_komentar= $_GET['id_komentar'];
	  $kueribarang = mysqli_query($koneksi,"delete from komentar where id_komentar='$id_komentar'"); } ?>
						<div class="review_grids">
							<h5>Tambahkan Komentar</h5>
						<input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
								<textarea name="komen" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="required" placeholder="Tulis Komentar"></textarea>
								<input type="submit" name="komentar" value="Komentari" >
						
						</div>
					</div> </div>
					<?php  } ?>
						</form>

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
						<form  method="post">
								<?php 
					if (isset($_POST['testimoni'])){ 
						$testimoni = $_POST['feedback'];
						$tanggal = date("Y-m-d H:i:s"); 
						if ($_SESSION['email']){
						$email = $_SESSION['email'];
 					    $query= mysqli_query($koneksi,"select * from pembeli where email='$email'");
						$data=mysqli_fetch_array($query);
						$idpembeli = $data['id_pembeli'];
						$emailpb = $data['email'];
						if($_SESSION['email']==$emailpb){
						$querySimpan = mysqli_query($koneksi,"INSERT INTO feedback (id_pembeli, id_penjual, pesan, tanggal) VALUES ('$idpembeli','$id_penjual', '$testimoni', '$tanggal')");
				
				} }
						?>
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
					</div> 

					<?php } else { ?>
					<?php 
						if ($_SESSION['email']){
						$email = $_SESSION['email'];
 					    $query= mysqli_query($koneksi,"select * from pembeli where email='$email'");
						$data=mysqli_fetch_array($query);
						$idpembeli = $data['id_pembeli'];
					   $query= mysqli_query($koneksi,"select * from feedback where id_pembeli='$idpembeli' and id_penjual='$id_penjual'");
						$data=mysqli_fetch_array($query);
						$idpb = $data['id_pembeli'];
						$idpj = $data['id_penjual'];
						if($idpembeli==$idpb && $id_penjual==$idpj){
						
				
				 ?>
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
					</div> 
					<?php } else { ?>
					
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
							<h5>Tambahkan Testimoni</h5>
								<textarea name="feedback" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="required" placeholder="Tulis Pesan Testimoni Penjual"></textarea>
								<input type="submit" name="testimoni" value="Testimoni" >
						
						</div>
					</div> 
					<?php } } } ?>
						</form>	        					            	      
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