<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
$username= $_SESSION['userr'];
$queryTampil=mysqli_query($koneksi,"SELECT * FROM pembeli where username='$username'");
$hasilQuery=mysqli_fetch_array($queryTampil);
$id_pembeli = $hasilQuery['id_pembeli'];
$norek = $hasilQuery['no_rek'];
$atasnama = $hasilQuery['atas_nama'];
?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>FORM KONFIRMASI PENGGUNAAN JASA REKBER</div>
                  <div class="card-body">
                    <form action="konfirmasi/aksi_simpan.php" method="post" class="form-horizontal">
                        <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>">
                        <input type="hidden" name="norek" value="<?php echo $norek; ?>">
                        <input type="hidden" name="atasnama" value="<?php echo $atasnama; ?>">

                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">JENIS KONFIRMASI</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="jenis" value="Jasa Rekber" readonly="readonly">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-form-label" for="appendedInput">KETERANGAN</label>
                        <div class="controls">
                          <div class="input-group">
                            <textarea class="form-control" id="appendedInput" size="16" type="text" name="keterangan"></textarea>
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