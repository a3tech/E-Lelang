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
                    <i class="fa fa-align-justify"></i>Tabel Laporan Admin</div>
                  <div class="card-body">
                    <nav>
                      <form method="post">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="admin_tambah.php">Tambah</a>
                        </li>&nbsp;&nbsp;
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan id atau nama" name="kunci">
                        </li>
                      </ul>
                    </nav>
          <?php 
        if(isset($_POST['kunci'])){
          ?>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>ID ADMIN</th>
                          <th>NAMA ADMIN</th>
                          <th>NO HP</th>
                          <th>USERNAME</th>
                          <th>PASSWORD</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                     <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kunci = $_POST['kunci'];
  $kuericari = mysqli_query($koneksi,"select * from admin where id_admin like '%$kunci%' or nama_admin like '%$kunci%' ");
  while($cari=mysqli_fetch_array($kuericari)){
    ?>
     <tbody>
                          <tr>
                          <td><?php echo $cari['id_admin']?></td>
                          <td><?php echo $cari['nama_admin']?></td>
                          <td><?php echo $cari['no_hp']?></td>
                          <td><?php echo $cari['username']?></td>
                          <td><?php echo $cari['password']?></td>
                          <td>
                            <span class="badge badge-warning"><a href="admin_ubah.php?id_admin=<?php echo $admin['id_admin'];?>">Ubah</a></span>
                            <span class="badge badge-danger"><a href="admin/aksi_hapus.php?id_admin=<?php echo $admin['id_admin'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
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
                          <th>ID ADMIN</th>
                          <th>NAMA ADMIN</th>
                          <th>NO HP</th>
                          <th>USERNAME</th>
                          <th>PASSWORD</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kueriadmin = mysqli_query($koneksi,"select * from admin");
  $no=1;
  while($admin=mysqli_fetch_array($kueriadmin)){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $admin['id_admin']?></td>
                          <td><?php echo $admin['nama_admin']?></td>
                          <td><?php echo $admin['no_hp']?></td>
                          <td><?php echo $admin['username']?></td>
                          <td><?php echo $admin['password']?></td>
                          <td>
                            <span class="badge badge-warning"><a href="admin_ubah.php?id_admin=<?php echo $admin['id_admin'];?>">Ubah</a></span>
                            <span class="badge badge-danger"><a href="admin/aksi_hapus.php?id_admin=<?php echo $admin['id_admin'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
                          </td>
                        </tr>
                      </tbody>
     <?php 
      $no++; } ?>
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