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
                          <th>NAMA BARANG</th>
                          <th>PENAWARAN</th>
                          <th>ALAMAT</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
 <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $id= $_SESSION['id'];
  $kueriwin = mysqli_query($koneksi,"select b.atas_nama,b.email,b.no_telp,b.alamat,a.total,c.nama_barang, a.id_bidding from bidding a join pembeli b on a.id_pembeli=b.id_pembeli join barang c on c.kd_barang=a.kd_barang join penjual d on d.id_penjual=a.id_penjual where a.id_penjual='$id' and a.id_pembeli=b.id_pembeli order by a.total desc limit 3");
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