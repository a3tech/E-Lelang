<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
$username = $_SESSION['userr'];
$queryTampil=mysqli_query($koneksi,"SELECT * FROM pembeli where username='$username'");
$hasilQuery=mysqli_fetch_array($queryTampil);
$id_pembeli = $hasilQuery['id_pembeli'];
$emailpembeli = $hasilQuery['email'];
?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>FORM KIRIM PESAN PRIVAT</div>
                  <div class="card-body">
                    <form action="pesan/aksi_simpan.php" method="post"  class="form-horizontal">
                        <div class="form-group">
                        <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>">
                        <input type="hidden" name="emailpembeli" value="<?php echo $emailpembeli; ?>">
                        <label class="col-form-label" for="appendedInput">EMAIL</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="email" name="email">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">SUBJECT</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="subject">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">PESAN</label>
                        <div class="controls">
                          <div class="input-group">
                            <textarea class="form-control" id="appendedInput" size="16" type="text" name="pesan"></textarea>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
          
                      <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Kirim</button>
                        <button class="btn btn-secondary" type="button" onclick=self.history.back()>Batal</button>
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