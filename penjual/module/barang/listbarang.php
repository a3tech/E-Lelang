<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Tabel Data Barang Lelang</div>
                  <div class="card-body">
                    <nav>
                     <form method="post">
                      <ul class="pagination">
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan Nama Barang" name="kunci">
                        </li>

                      </ul>
                    </nav>
          <?php 
        if(isset($_POST['kunci'])){
          ?>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>NAMA BARANG</th>
                          <th>KATEGORI</th>
                          <th>HARGA AWAL</th>
                          <th>HARGA BID</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                     <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $username = $_SESSION['user'];
  $kunci = $_POST['kunci'];
  $kuericari = mysqli_query($koneksi,"select * from barang a join penjual b on a.id_penjual=b.id_penjual where b.username='$username' and a.nama_barang like '%$kunci%'");
  $no=1;
  while($cari=mysqli_fetch_array($kuericari)){
    ?>
     <tbody>
                          <tr>
                          <td><?php echo $no?></td>
                          <td><?php echo $cari['nama_barang']?></td>
                          <td><?php echo $cari['kategori']?></td>
                          <td><?php echo $cari['harga']?></td>
                          <td><?php echo $cari['nominal_bid']?></td>
                          <td>
                              <span class="badge badge-warning"><a href="barang_ubah.php?kd_barang=<?php echo $cari['kd_barang'];?>">Ubah</a></span>
                              <span class="badge badge-warning"><a href="../detailbarang.php?kd_barang=<?php echo $cari['kd_barang'];?>">Detail</a></span>
                            <span class="badge badge-danger"><a href="barang/aksi_hapus.php?kd_barang=<?php echo $cari['kd_barang'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Barang Ini ?')">Hapus</a></span>
                          </td>
                        </tr>
                      </tbody>
                        <?php 
    $no++; } ?>
                    </table>
         </form>

    <?php } else { ?>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>NAMA BARANG</th>
                          <th>KATEGORI</th>
                          <th>HARGA AWAL</th>
                          <th>HARGA BID</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                                    <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $username = $_SESSION['user'];
  $kueribarang = mysqli_query($koneksi,"select * from barang a join penjual b on a.id_penjual=b.id_penjual where b.username='$username'");
  $no=1;
  while($brg=mysqli_fetch_array($kueribarang)){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $no?></td>
                          <td><?php echo $brg['nama_barang']?></td>
                          <td><?php echo $brg['kategori']?></td>
                          <td><?php echo $brg['harga']?></td>
                          <td><?php echo $brg['nominal_bid']?></td>
                          <td>
                             <span class="badge badge-warning"><a href="barang_ubah.php?kd_barang=<?php echo $brg['kd_barang'];?>">Ubah</a></span>
                              <span class="badge badge-warning"><a href="../detailbarang.php?kd_barang=<?php echo $brg['kd_barang'];?>">Detail</a></span>
                            <span class="badge badge-danger"><a href="barang/aksi_hapus.php?kd_barang=<?php echo $brg['kd_barang'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Barang Ini ?')">Hapus</a></span>
                          </td>
                        </tr> 
                      </tbody>
 <?php 
      $no++;
    }
?>
                    </table>
                  <?php } ?>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div>
      </main>
</body>
</html>