<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";

$idpenjual=$_GET['id_penjual'];
$queryEdit=mysqli_query($koneksi,"SELECT * FROM penjual WHERE id_penjual='$idpenjual'");
$hasilQuery=mysqli_fetch_array($queryEdit);
$idpenjual = $hasilQuery['id_penjual'];
$email = $hasilQuery['email'];
$atasnama = $hasilQuery['atas_nama'];
$norek= $hasilQuery['no_rek'];
$bank = $hasilQuery['nama_bank'];
$alamat = $hasilQuery['alamat'];
$nohp = $hasilQuery['no_telp'];
$username = $hasilQuery['username'];
$password = $hasilQuery['password'];
?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>FORM UBAH DATA PENJUAL</div>
                  <div class="card-body">
                    <form action="penjual/aksi_edit.php" method="post"  class="form-horizontal">
                        <div class="form-group">
                      <input type="hidden" name="id_penjual" value="<?php echo $idpenjual; ?>">
                        <label class="col-form-label" for="appendedInput">EMAIL</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="email" name="email" value="<?php echo $email; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">ATAS NAMA</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="atas_nama" value="<?php echo $atasnama; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NO REK</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="norek" value="<?php echo $norek; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NAMA BANK</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="bank" value="<?php echo $bank; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="col-form-label" for="appendedInput">Alamat</label>
                        <div class="controls">
                          <div class="input-group">
                            <textarea class="form-control" id="appendedInput" size="16" type="text" name="alamat"><?php echo $alamat; ?></textarea>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NO HP</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="nohp" value="<?php echo $nohp; ?>">
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
                            <input class="form-control" id="appendedInput" size="16" type="text" name="password" value="<?php echo $password; ?>">
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