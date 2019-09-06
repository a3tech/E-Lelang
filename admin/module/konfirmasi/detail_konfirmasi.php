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
$email = $hasilQuery['email'];
$atasnama = $hasilQuery['atas_nama'];
$norek = $hasilQuery['no_rek'];
$bank = $hasilQuery['nama_bank'];
$jenis = $hasilQuery['jenis'];
$keterangan = $hasilQuery['keterangan'];

?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>DETAIL KONFIRMASI MEMBER</div>
                  <div class="card-body">
                   <form action="#" class="form-horizontal">
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">ATAS NAMA</label>
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
                        <label class="col-form-label" for="appendedInput">NOMOR REKENING</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="subject" value="<?php echo $norek; ?>" readonly="readonly">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NAMA BANK</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="subject" value="<?php echo $bank; ?>" readonly="readonly">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">JENIS KONFIRMASI</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="subject" value="<?php echo $jenis; ?>" readonly="readonly">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                          <div class="form-group">
                        <label class="col-form-label" for="appendedInput">KETERANGAN</label>
                        <div class="controls">
                          <div class="input-group">
                            <textarea class="form-control" id="appendedInput" size="16" type="text" name="pesan" readonly="readonly" ><?php echo $keterangan; ?></textarea>
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