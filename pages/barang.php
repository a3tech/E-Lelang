<!DOCTYPE html>
<html>
<head>
	<title></title>
	   <script>
//            membuat objek XMLHttpRequest
            var xmlHttp = new XMLHttpRequest();
            
//            membuat fungsi getData untuk memanggil file php
            function getData(source,id){
                if(xmlHttp != null){
                    var o = document.getElementById(id);
                    xmlHttp.open("GET", source);
                    xmlHttp.onreadystatechange = function(){
                        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
                            o.innerHTML = xmlHttp.responseText;
                        }
                    }
                    xmlHttp.send(null);
                }
            }
            
//            membuat fungsi jam untuk memanggul file jam.php
            function jam(){
                getData("jam.php","jam")
            }
        </script>
</head>
<body onload="setInterval(jam,1000)">
 <div id="jam"></div>
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Lelang Terbaru</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		
		
	      <div class="section group">
	        <?php if(isset($_POST['cari'])){
	include "lib/config.php";
	include "lib/koneksi.php";
	$cari = $_POST['cari'];
	$kueribarang = mysqli_query($koneksi,"select foto_1, nama_barang, harga, kd_barang, max(tanggal_berakhir) as tanggal_berakhir from barang a join penjual b on a.id_penjual=b.id_penjual where a.status='mulai' and a.nama_barang like '%$cari%' group by tanggal_berakhir desc limit 8");
	while($barang=mysqli_fetch_array($kueribarang)){
		?>   
				<div class="grid_1_of_4 images_1_of_4">
				<div class="fh5co-card-item">
				<figure>
				
					 <img src="penjual/upload/<?php echo $barang['foto_1'];?>" alt="" />
					 </figure>
				 <h3 ><?php echo $barang['nama_barang']; ?></h3> 
				 <h3><?php echo $barang['tanggal_berakhir']; ?></h3>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">Rp <?php echo $barang['harga'];?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="detailbarang.php?kd_barang=<?php echo $barang['kd_barang'];?>">Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 </div>
				</div>

					<?php  } } else { ?>
	        <?php
	include "lib/config.php";
	include "lib/koneksi.php";
	$kueribarang = mysqli_query($koneksi,"select foto_1, nama_barang, harga, kd_barang, max(tanggal_berakhir) as tanggal_berakhir from barang a join penjual b on a.id_penjual=b.id_penjual where a.status='mulai' group by tanggal_berakhir desc limit 8");
	while($barang=mysqli_fetch_array($kueribarang)){
		$a = $barang['tanggal_berakhir'];
		?>

				<div class="grid_1_of_4 images_1_of_4">
				<div class="fh5co-card-item">
				<figure>
				
					 <img src="penjual/upload/<?php echo $barang['foto_1'];?>" alt="" />
					 </figure>
				 <h3 ><?php echo $barang['nama_barang']; ?></h3> 
				 <h3><?php echo $barang['tanggal_berakhir']; ?></h3>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">Rp <?php echo $barang['harga'];?></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="detailbarang.php?kd_barang=<?php echo $barang['kd_barang'];?>">Detail</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 </div>
				</div>

					<?php  }} ?>
		
			</div>
    </div>
 </div>
</div>

</body>
</html>