<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";

$idkonfirm=$_GET['id_konfirm'];
$queryEdit=mysqli_query($koneksi,"select * from konfirmasi a join detail_konfirmasi b on 
                    a.id_konfirm=b.id_konfirm join pembeli c on b.id_pembeli=c.id_pembeli where a.id_konfirm='$idkonfirm'");
$hasilQuery=mysqli_fetch_array($queryEdit);
$id_pembeli=$hasilQuery['id_pembeli'];
$email = $hasilQuery['email'];
$jenis = $hasilQuery['jenis'];
$atasnama = $hasilQuery['atas_nama'];
$norek = $hasilQuery['no_rek'];


if($jenis=='Top Up Saldo'){

?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>FORM KONFIRMASI TOP UP SALDO JAMINAN LELANG</div>
                  <div class="card-body">
                    <form action="konfirmasi/aksi_kirim.php" method="post" class="form-horizontal">
                        <div class="form-group">
                         <input type="hidden" name="id_pembeli" value="<?php echo $id_pembeli; ?>">
                        <label class="col-form-label"
                         for="appendedInput">ATAS NAMA</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="nama" value="<?php echo $atasnama; ?>" readonly="readonly">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">EMAIL MEMBER</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="email" value="<?php echo $email; ?>" readonly="readonly">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NO REKENING</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="subject" value="<?php echo $norek; ?>" readonly="readonly">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                             <div class="form-group">
                        <label class="col-form-label" for="appendedInput">JUMLAH SALDO</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="saldo">
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
        </div><?php } else{ ?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>FORM KONFIRMASI EMAIL JASA REKBER</div>
                  <div class="card-body">
                    <form action="konfirmasi/aksi_kirimemail.php" method="post" class="form-horizontal">
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NAMA ADMIN</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="nama" value="ADMIN E-LELANG" readonly="readonly">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">EMAIL MEMBER</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="email" value="">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">SUBJECT</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="subject" value="KONFIRMASI <?php echo $jenis; ?> DARI ADMIN E-LELANG" readonly="readonly">
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
<?php } ?>
</body>
</html>