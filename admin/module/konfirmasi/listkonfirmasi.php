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
                    <i class="fa fa-align-justify"></i>Tabel Laporan Konfirmasi</div>
                  <div class="card-body">
                   <nav>
           <form method="post">
                      <ul class="pagination">
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan no rek atau nama" name="kunci">
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
                          <th>NO_REK</th>
                          <th>BANK</th>
                          <th>JENIS</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                     <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kunci = $_POST['kunci'];
  $kuericari = mysqli_query($koneksi,"select * from konfirmasi a join detail_konfirmasi b on 
                    a.id_konfirm=b.id_konfirm join pembeli c on b.id_pembeli=c.id_pembeli  where c.no_rek like '%$kunci%' or c.atas_nama like '%$kunci%' ");
  $no=1;
  while($cari=mysqli_fetch_array($kuericari)){
    ?>
     <tbody>
                          <tr>
                          <td><?php echo $no?></td>
                          <td><?php echo $cari['email']?></td>
                          <td><?php echo $cari['atas_nama']?></td>
                          <td><?php echo $cari['no_rek']?></td>
                          <td><?php echo $cari['nama_bank']?></td>
                          <td><?php echo $cari['jenis']?></td>
                          <td>
                             <span class="badge badge-warning"><a href="konfirmasi_tambah.php?id_konfirm=<?php echo $cari['id_konfirm'];?>">Konfirmasi</a></span>
                            <span class="badge badge-warning"><a href="konfirmasi_detail.php?id_konfirm=<?php echo $cari['id_konfirm'];?>">Detail</a></span>
                            <span class="badge badge-danger"><a href="konfirmasi/aksi_hapus.php?id_konfirm=<?php echo $cari['id_konfirm'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
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
                          <th>NO_REK</th>
                          <th>BANK</th>
                          <th>JENIS</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
  <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kuerikonfirmasi = mysqli_query($koneksi,"select * from konfirmasi a join detail_konfirmasi b on 
                    a.id_konfirm=b.id_konfirm join pembeli c on b.id_pembeli=c.id_pembeli ");
  $no=1;
  while($konfirmasi=mysqli_fetch_array($kuerikonfirmasi)){
    ?>
                      <tbody>
                        <tr>
                          <td><?php echo $no?></td>
                          <td><?php echo $konfirmasi['email']?></td>
                          <td><?php echo $konfirmasi['atas_nama']?></td>
                          <td><?php echo $konfirmasi['no_rek']?></td>
                          <td><?php echo $konfirmasi['nama_bank']?></td>
                          <td><?php echo $konfirmasi['jenis']?></td>
                          <td>
                            <span class="badge badge-warning"><a href="konfirmasi_tambah.php?id_konfirm=<?php echo $konfirmasi['id_konfirm'];?>">Konfirmasi</a></span>
                            <span class="badge badge-warning"><a href="konfirmasi_detail.php?id_konfirm=<?php echo $konfirmasi['id_konfirm'];?>">Detail</a></span>
                            <span class="badge badge-danger"><a href="konfirmasi/aksi_hapus.php?id_konfirm=<?php echo $konfirmasi['id_konfirm'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
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