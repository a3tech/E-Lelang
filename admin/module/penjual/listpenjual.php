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
                    <i class="fa fa-align-justify"></i>Tabel Laporan Penjual</div>
                  <div class="card-body">
                   <nav>

               <form method="post">
                      <ul class="pagination">
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan email atau nama" name="kunci">
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
                          <th>NO REK</th>
                          <th>NAMA_BANK</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                     <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kunci = $_POST['kunci'];
  $kuericari = mysqli_query($koneksi,"select * from penjual where email like '%$kunci%' or atas_nama like '%$kunci%' ");
  $no=1;
  while($cari=mysqli_fetch_array($kuericari)){
    ?>
     <tbody>
                          <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $cari['email']?></td>
                          <td><?php echo $cari['atas_nama']?></td>
                          <td><?php echo $cari['no_rek']?></td>
                          <td><?php echo $cari['nama_bank']?></td>
                          <td>
                            <span class="badge badge-warning"><a href="penjual_ubah.php?id_penjual=<?php echo $cari['id_penjual'];?>">Ubah</a></span>
                            <span class="badge badge-danger"><a href="penjual/aksi_hapus.php?id_penjual=<?php echo $cari['id_penjual'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
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
                          <th>NO REK</th>
                          <th>NAMA_BANK</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kueripenjual = mysqli_query($koneksi,"select * from penjual");
  $no=1;
  while($penjual=mysqli_fetch_array($kueripenjual)){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $penjual['email']?></td>
                          <td><?php echo $penjual['atas_nama']?></td>
                          <td><?php echo $penjual['no_rek']?></td>
                          <td><?php echo $penjual['nama_bank']?></td>
                          <td>
                          <span class="badge badge-warning"><a href="penjual_ubah.php?id_penjual=<?php echo $penjual['id_penjual'];?>">Ubah</a></span>
                            <span class="badge badge-danger"><a href="penjual/aksi_hapus.php?id_penjual=<?php echo $penjual['id_penjual'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
                          </td>
                        </tr>
                      </tbody>
                            <?php 
      $no++;} ?>
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