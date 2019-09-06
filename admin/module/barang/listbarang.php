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
                    <i class="fa fa-align-justify"></i>Tabel Laporan Barang Lelang</div>
                  <div class="card-body">
                   <nav>
               <form method="post">
                      <ul class="pagination">
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan email atau barang" name="kunci">
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
                          <th>EMAIL</th>
                          <th>ATAS_NAMA</th>
                          <th>KATEGORI</th>
                          <th>NAMA_BARANG</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                     <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kunci = $_POST['kunci'];
  $kuericari = mysqli_query($koneksi,"select * from barang a join penjual b on a.id_penjual=b.id_penjual where b.email like '%$kunci%' or a.nama_barang like '%$kunci%' ");
  $no=1;
  while($cari=mysqli_fetch_array($kuericari)){
    ?>
     <tbody>
                          <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $cari['email']?></td>
                          <td><?php echo $cari['atas_nama']?></td>
                          <td><?php echo $cari['kategori']?></td>
                          <td><?php echo $cari['nama_barang']?></td>
                          <td>
                          <span class="badge badge-danger"><a href="barang/aksi_hapus.php?id_barang=<?php echo $cari['id_barang'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
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
                          <th>EMAIL</th>
                          <th>ATAS_NAMA</th>
                          <th>KATEGORI</th>
                          <th>NAMA_BARANG</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
     <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kueribarang = mysqli_query($koneksi,"select * from barang a join penjual b on a.id_penjual=b.id_penjual");
  $no=1;
  while($barang=mysqli_fetch_array($kueribarang)){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $barang['email']?></td>
                          <td><?php echo $barang['atas_nama']?></td>
                          <td><?php echo $barang['kategori']?></td>
                          <td><?php echo $barang['nama_barang']?></td>
                          <td>
                            <span class="badge badge-danger"><a href="barang/aksi_hapus.php?id_barang=<?php echo $barang['id_barang'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
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