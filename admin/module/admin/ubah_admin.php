<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";

$idadmin=$_GET['id_admin'];
$queryEdit=mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$idadmin'");
$hasilQuery=mysqli_fetch_array($queryEdit);
$idadmin = $hasilQuery['id_admin'];
$nama = $hasilQuery['nama_admin'];
$nohp = $hasilQuery['no_hp'];
$username = $hasilQuery['username'];
$password = $hasilQuery['password'];
?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>FORM UBAH DATA ADMIN</div>
                  <div class="card-body">
                    <form action="admin/aksi_edit.php" method="post" class="form-horizontal">
                        <div class="form-group">
                          <input type="hidden" name="id_admin" value="<?php echo $idadmin; ?>">
                        <label class="col-form-label" for="appendedInput">NAMA ADMIN</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="nama" value="<?php echo $nama; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NO HP</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="no_hp" value="<?php echo $nohp; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">USERNAME</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="username" value="<?php echo $username; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">PASSWORD</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="password" name="password" value="<?php echo $password; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
          
                      <div class="form-actions">
                        <button class="btn btn-primary" name="save" type="submit">Simpan</button>
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