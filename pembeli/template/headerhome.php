<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../asset/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../asset/css/stylee.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../asset/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="../asset/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="../asset/js/move-top.js"></script>
<script type="text/javascript" src="../asset/js/easing.js"></script>
<script type="text/javascript" src="../asset/js/startstop-slider.js"></script>
</head>
<body>
 <div class="wrap">
	<div class="header">
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="../upload1/e-lelang_logo.jpg" alt="" /></a>
			</div>
			<?php if($_SESSION['saldo']==null) { ?>
			   <div class="cart">
			  	   <p>Saldo Jaminan Rp 0 </p>
			  </div> 
			 <?php } else { ?>
			  <div class="cart">
			  	   <p>Saldo Jaminan Rp <?php echo $_SESSION['saldo']; ?> </p>
			  </div> 
			  <?php } ?>
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	 		<ul>
			    	<li class="active"><a href="home.php">Home</a></li>
			    	<li><a href="bantuan.php">Bantuan</a></li>
			    	<li><a href="barang.php">Barang</a></li>
			    	<li><a href="../login.php">Profil</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>	     
	<div class="header_slide">
			<div class="header_bottom_left">				
				<div class="categories">
				  <ul>
				  	<h3>Kategori</h3>
				  <li><a href="home.php?kategori=BARANG ANTIK">Barang Antik</a></li>
				      <li><a href="home.php?kategori=BARANG KOLEKSI">Barang Koleksi</a></li>
				      <li><a href="home.php?kategori=ELEKTRONIK">Elektronik</a></li>
				      <li><a href="home.php?kategori=FASHION">Fashion</a></li>
				      <li><a href="home.php?kategori=FURNITURE">Furniture</a></li>
				      <li><a href="home.php?kategori=OLAHRAGA">Olahraga</a></li>
				      <li><a href="home.php?kategori=KENDARAAN">Kendaraan</a></li>
				      <li><a href="home.php?kategori=HEWAN">Hewan</a></li>
				  </ul>
				</div>					
	  	     </div>
					 <div class="header_bottom_right">					 
				<img src="../upload1/rekber.png" alt="" />
		      </div>
		   <div class="clear"></div>
		</div>
   </div>

</body>
</html>