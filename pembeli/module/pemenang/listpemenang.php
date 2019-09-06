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
                    <i class="fa fa-align-justify"></i>Tabel Data Pemenang Barang Lelang</div>
                  <div class="card-body">
                    <nav>
                    </nav>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>ATAS NAMA</th>
                          <th>EMAIL</th>
                          <th>NO HP</th>
                          <th>HARGA TERTINGGI</th>
                          <th>ALAMAT</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $id= $_SESSION['id'];
  $kueriwin = mysqli_query($koneksi,"select * from pemenang a join pembeli b on a.id_pembeli=b.id_pembeli join bidding c on a.id_bidding = c.id_bidding join barang d on c.kd_barang=d.kd_barang where a.id_pembeli='$id'");
  while($win=mysqli_fetch_array($kueriwin)){
    ?>
                      <tbody>
                        <tr>
                          <td><?php echo $win['atas_nama']?></td>
                          <td><?php echo $win['email']?></td>
                          <td><?php echo $win['no_telp']?></td>
                          <td><?php echo $win['nama_barang']?></td>
                          <td><?php echo $win['total']?></td>
                          <td><?php echo $win['alamat']?></td>
                          <td>
                            <span class="badge badge-danger"><a href="pemenang/aksi_hapus.php?id_bidding=<?php echo $win['id_bidding']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
                          </td>
                        </tr>
                      </tbody>
  <?php 
    }
?>
                    </table>
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