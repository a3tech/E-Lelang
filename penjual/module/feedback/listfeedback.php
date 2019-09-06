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
                    <i class="fa fa-align-justify"></i>Tabel Data Feedback</div>
                  <div class="card-body">
                    <nav>
                 <form method="post">
                      <ul class="pagination">
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan email pembeli" name="kunci">
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
                          <th>TANGGAL</th>
                          <th>ISI FEEDBACK</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                     <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $kunci = $_POST['kunci'];
  $id_penjual= $_SESSION['id'];
  $kuericari = mysqli_query($koneksi,"select * from feedback a join pembeli b on a.id_pembeli=b.id_pembeli where id_penjual='$id_penjual'and b.email like '%$kunci%' ");
  $no=1;
  while($cari=mysqli_fetch_array($kuericari)){
    ?>
     <tbody>
                          <tr>
                          <td><?php echo $no?></td>
                          <td><?php echo $cari['email'] ?></td>
                          <td><?php echo $cari['tanggal'] ?></td>
                          <td><?php echo $cari['pesan'] ?></td>
                          <td>
                             <span class="badge badge-danger"><a href="feeedback/aksi_hapus.php?id_feedback=<?php echo $cari['id_feedback'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Feedback Ini ?')">Hapus</a></span>
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
                          <th>TANGGAL</th>
                          <th>ISI FEEDBACK</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
                       <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $id_penjual = $_SESSION['id'];
  $kuerifeedback = mysqli_query($koneksi,"select * from feedback a join pembeli b on a.id_pembeli=b.id_pembeli where id_penjual='$id_penjual'");
  $no=1;
  while($fdb=mysqli_fetch_array($kuerifeedback)){
    ?>
                      <tbody> 
                          <tr>
                          <td><?php echo $no?></td>
                          <td><?php echo $fdb['email'] ?></td>
                          <td><?php echo $fdb['tanggal'] ?></td>
                          <td><?php echo $fdb['pesan'] ?></td>
                          <td>
                            <span class="badge badge-danger"><a href="feeedback/aksi_hapus.php?id_feedback=<?php echo $fdb['id_feedback'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus ?')">Hapus</a></span>
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