<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
$id_pesan=$_GET['id_pesan'];
$queryDetail=mysqli_query($koneksi,"select * from pesan a join pembeli b on a.id_pembeli=b.id_pembeli join penjual c on a.emailpenjual=c.email where a.id_pembeli=b.id_pembeli and (a.id_pesan='$id_pesan' and a.emailpembeli=b.email) ");
$hasilQuery=mysqli_fetch_array($queryDetail);
$email = $hasilQuery['emailpembeli'];
$subject = $hasilQuery['subject'];
$pesan = $hasilQuery['pesan'];
?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>DETAIL PESAN MASUK</div>
                  <div class="card-body">
                    <form action="#" method="post" class="form-horizontal">
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">EMAIL</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="email" value="<?php echo $email; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">SUBJECT</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" value="<?php echo $subject; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">PESAN</label>
                        <div class="controls">
                          <div class="input-group">
                            <textarea class="form-control" id="appendedInput" size="16" type="text"><?php echo $pesan; ?></textarea>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
          
                      <div class="form-actions">
                        <button class="btn btn-secondary" type="button" onclick=self.history.back()>Kembali</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div>
</body>
</html>