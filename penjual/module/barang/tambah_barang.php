<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
  $username = $_SESSION['user'];
  $kueribarang = mysqli_query($koneksi,"select * from penjual where username='$username'");
$hasilQuery=mysqli_fetch_array($kueribarang);
$idpenjual = $hasilQuery['id_penjual'];
    ?>
 <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>FORM POSTING BARANG LELANG</div>
                  <div class="card-body">
                    <form action="barang/aksi_simpan.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                        <input type="hidden" name="id_penjual" value="<?php echo $idpenjual; ?>">
                        <label class="col-form-label" for="appendedInput">NAMA BARANG</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="nama">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">KATEGORI</label>
                        <div class="controls">
                          <div class="input-group">
                           <select name="kategori" class="form-control">
      <option value="">Pilih Kategori Barang</option>
      <option value="BARANG ANTIK">BARANG ANTIK</option>
      <option value="BARANG KOLEKSI">BARANG KOLEKSI</option>
      <option value="ELEKTRONIK">ELEKTRONIK</option>
      <option value="FASHION">FASHION</option>
      <option value="FURNITURE">FURNITURE</option>
      <option value="OLAHRAGA">OLAHRAGA</option>
      <option value="KENDARAAN">KENDARAAN</option>
      <option value="HEWAN">HEWAN</option>
      </select>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">HARGA AWAL</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="harga">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">HARGA BID</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="bid">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">FOTO BARANG</label>
                        <div class="controls">
                          <div class="input-group">
                          <input class="form-control" size="16" type="file" id="gambar" name="gambar[]" multiple class="form-control" placeholder="Foto Tempat 1">
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>

                         <div class="form-group">
                        <label class="col-form-label" for="appendedInput">BATAS WAKTU LELANG</label>
                        <div class="controls">
                          <div class="input-append date form_datetime" data-date-format="yyyy-mm-dd hh:mm:ss">
                <input type="text" name="tgl_berakhir" class="form-control" >
                <span class="add-on"><i class="icon-th"></i></span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-form-label" for="appendedInput">SPESIFIKASI BARANG</label>
                        <div class="controls">
                          <div class="input-group">
                            <textarea class="form-control" id="appendedInput" size="16" type="text" name="spesifikasi"></textarea>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
          
                      <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Posting</button>
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