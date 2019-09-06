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
                    <i class="fa fa-align-justify"></i>Tabel Pesan Masuk</div>
                  <div class="card-body">
                    <nav>
                    </nav>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>EMAIL</th>
                          <th>SUBJECT</th>
                          <th>TANGGAL</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                                      <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $username= $_SESSION['userr'];
  $kueripm = mysqli_query($koneksi,"select * from pesan a join penjual b on a.id_penjual=b.id_penjual join pembeli c on a.emailpembeli=c.email where c.username='$username' and (a.emailpembeli=c.email and a.emailpenjual=b.email) ");
  $no=1;
  while($pm=mysqli_fetch_array($kueripm)){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $no?></td>
                          <td><?php echo $pm['emailpenjual']?></td>
                          <td><?php echo $pm['subject']?></td>
                          <td><?php echo $pm['tanggal_masuk']?></td>
                          <td>
                            <span class="badge badge-warning"><a href="pesan_detail.php?id_pesan=<?php echo $pm['id_pesan'];?>">Detail</a></span>
                            <span class="badge badge-danger"><a href="pesan/aksi_hapus.php?id_pesan=<?php echo $pm['id_pesan'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Pesan Ini ?')">Hapus</a></span>
                          </td>
                        </tr>
                      </tbody>
                                            <?php 
      $no++;
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