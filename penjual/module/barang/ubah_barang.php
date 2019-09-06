<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
$kd_barang=$_GET['kd_barang'];
$queryEdit=mysqli_query($koneksi,"SELECT * FROM barang WHERE kd_barang='$kd_barang'");
$hasilQuery=mysqli_fetch_array($queryEdit);
$kd_barang = $hasilQuery['kd_barang'];
$nama = $hasilQuery['nama_barang'];
$harga = $hasilQuery['harga'];
$spesifikasi = $hasilQuery['deskripsi'];
$kategori = $hasilQuery['kategori'];
$bid = $hasilQuery['nominal_bid'];
$tglberakhir = $hasilQuery['tanggal_berakhir'];
?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>FORM UBAH DATA BARANG LELANG</div>
                  <div class="card-body">
                    <form action="barang/aksi_edit.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                          <input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
                        <label class="col-form-label" for="appendedInput">NAMA BARANG</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="nama" value="<?php echo $nama; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">KATEGORI</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="kategori" value="<?php echo $kategori; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">HARGA AWAL</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="harga" value="<?php echo $harga; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">HARGA BID</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="bid" value="<?php echo $bid; ?>">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>

                          <div class="form-group">
                        <label class="col-form-label" for="appendedInput">BATAS WAKTU LELANG</label>
                        <div class="controls">
                          <div class="input-append date form_datetime" data-date-format="yyyy-mm-dd hh:mm:ss">
                <input type="text" name="tgl_berakhir" class="form-control" value="<?php echo $tglberakhir; ?>">
                <span class="add-on"><i class="icon-th"></i></span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-form-label" for="appendedInput">SPESIFIKASI BARANG</label>
                        <div class="controls">
                          <div class="input-group">
                            <textarea class="form-control" id="appendedInput" size="16" type="text" name="spesifikasi"><?php echo $spesifikasi; ?></textarea>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
          
                      <div class="form-actions">
                        <input class="btn btn-primary" type="submit" name="save" value="Simpan">
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