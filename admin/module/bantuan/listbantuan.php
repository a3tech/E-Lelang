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
                    <i class="fa fa-align-justify"></i>Tabel Laporan Info Bantuan</div>
                  <div class="card-body">
                   <nav>
              <form method="post">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="bantuan_tambah.php">Tambah</a>
                        </li>&nbsp;&nbsp;
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan id atau judul" name="kunci">
                        </li>

                      </ul>
                    </nav>
          <?php 
        if(isset($_POST['kunci'])){
          ?>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>ID INFO</th>
                          <th>JUDUL</th>
                          <th>ISI_INFO</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                     <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kunci = $_POST['kunci'];
  $kuericari = mysqli_query($koneksi,"select * from info where id_info like '%$kunci%' or judul like '%$kunci%' ");
  while($cari=mysqli_fetch_array($kuericari)){
    ?>
     <tbody>
                          <tr>
                          <td><?php echo $cari['id_info']?></td>
                          <td><?php echo $cari['judul']?></td>
                          <td><?php echo $cari['isi_informasi']?></td>
                          <td>
                            <span class="badge badge-warning"><a href="bantuan_ubah.php?id_info=<?php echo $cari['id_info'];?>">Ubah</a></span>
                            <span class="badge badge-danger"><a href="bantuan/aksi_hapus.php?id_info=<?php echo $cari['id_info'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
                          </td>
                        </tr>
                      </tbody>
                        <?php 
    } ?>
                    </table>
         </form>

    <?php } else { ?>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>ID INFO</th>
                          <th>JUDUL</th>
                          <th>ISI_INFO</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                        <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kueriinfo = mysqli_query($koneksi,"select * from info");
  $no=1;
  while($info=mysqli_fetch_array($kueriinfo)){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $info['id_info']?></td>
                          <td><?php echo $info['judul']?></td>
                          <td><?php echo $info['isi_informasi']?></td>
                          <td>
                        <span class="badge badge-warning"><a href="bantuan_ubah.php?id_info=<?php echo $info['id_info'];?>">Ubah</a></span>
                            <span class="badge badge-danger"><a href="bantuan/aksi_hapus.php?id_info=<?php echo $info['id_info'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
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