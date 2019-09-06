<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";

$idinfo=$_GET['id_info'];
$queryEdit=mysqli_query($koneksi,"SELECT * FROM info WHERE id_info='$idinfo'");
$hasilQuery=mysqli_fetch_array($queryEdit);
$idinfo = $hasilQuery['id_info'];
$judul = $hasilQuery['judul'];
$info = $hasilQuery['isi_informasi'];
?>
<div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>FORM UBAH DATA BANTUAN INFORMASI</div>
                  <div class="card-body">
                    <form action="bantuan/aksi_edit.php" method="post" class="form-horizontal">
                        <div class="form-group">
                      <input type="hidden" name="id_info" value="<?php echo $idinfo; ?>">
                        <label class="col-form-label" for="appendedInput">JUDUL</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="judul" value="<?php echo $judul; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">ISI INFO</label>
                        <div class="controls">
                          <div class="input-group">
                            <textarea class="form-control" id="appendedInput" size="16" type="text" name="info"><?php echo $info; ?></textarea>
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