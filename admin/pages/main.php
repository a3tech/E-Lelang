<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">
            <a href="bantuan.php">Bantuan</a>
          </li>
          <li class="breadcrumb-item"><a href="barang.php">Barang</a></li>
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                    <?php 
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $kueriadmin = mysqli_query($koneksi,"select count(*) as total from pembeli");
                  $admin=mysqli_fetch_array($kueriadmin);
                  $a = $admin['total'];
                    ?>
                    <div class="text-value"><?php echo $a; ?></div>
                    <div>Member Pembeli</div>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart1" height="70"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-info">
                  <div class="card-body pb-0">
                    <button class="btn btn-transparent p-0 float-right" type="button">
                      <i class="icon-location-pin"></i>
                    </button>
                    <?php 
                  $kueriadmin = mysqli_query($koneksi,"select count(*) as total from penjual");
                  $admin=mysqli_fetch_array($kueriadmin);
                  $a = $admin['total'];
                    ?>
                    <div class="text-value"><?php echo $a; ?></div>
                    <div>Members Penjual</div>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart2" height="70"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-warning">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                            <?php 
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $kueriadmin = mysqli_query($koneksi,"select count(*) as total from barang");
                  $admin=mysqli_fetch_array($kueriadmin);
                  $a = $admin['total'];
                    ?>
                    <div class="text-value"><?php echo $a; ?></div>
                    <div>Total Pelelangan</div>
                  </div>
                  <div class="chart-wrapper mt-3" style="height:70px;">
                    <canvas class="chart" id="card-chart3" height="70"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-danger">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                   <?php 
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $kueriadmin = mysqli_query($koneksi,"select count(*) as total from info");
                  $admin=mysqli_fetch_array($kueriadmin);
                  $a = $admin['total'];
                    ?>
                    <div class="text-value"><?php echo $a; ?></div>
                    <div>Total Info Bantuan</div>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-5">
                    <h4 class="card-title mb-0">Traffic</h4>
                    <div class="small text-muted">Januari 2019</div>
                  </div>
                  <!-- /.col-->
                  <div class="col-sm-7 d-none d-md-block">
                    <button class="btn btn-primary float-right" type="button">
                      <i class="icon-cloud-download"></i>
                    </button>
                    <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
                      <label class="btn btn-outline-secondary">
                        <input id="option1" type="radio" name="options" autocomplete="off"> Day
                      </label>
                      <label class="btn btn-outline-secondary active">
                        <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Month
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input id="option3" type="radio" name="options" autocomplete="off"> Year
                      </label>
                    </div>
                  </div>
                  <!-- /.col-->
                </div>
                <!-- /.row-->
                <div class="chart-wrapper" style="height:300px;margin-top:40px;">
                  <canvas class="chart" id="main-chart" height="300"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="row text-center">
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Visits</div>
                    <strong>29.703 Users (40%)</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Unique</div>
                    <strong>24.093 Users (20%)</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Pageviews</div>
                    <strong>78.706 Views (60%)</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">New Users</div>
                    <strong>22.123 Users (80%)</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Bounce Rate</div>
                    <strong>40.15%</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-->
            <div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <div class="brand-card-header bg-facebook">
                    <i class="fa fa-facebook"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-1" height="90"></canvas>
                    </div>
                  </div>
                  <div class="brand-card-body">
                    <div>
                      <div class="text-value">89k</div>
                      <div class="text-uppercase text-muted small">friends</div>
                    </div>
                    <div>
                      <div class="text-value">459</div>
                      <div class="text-uppercase text-muted small">feeds</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <div class="brand-card-header bg-twitter">
                    <i class="fa fa-twitter"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-2" height="90"></canvas>
                    </div>
                  </div>
                  <div class="brand-card-body">
                    <div>
                      <div class="text-value">973k</div>
                      <div class="text-uppercase text-muted small">followers</div>
                    </div>
                    <div>
                      <div class="text-value">1.792</div>
                      <div class="text-uppercase text-muted small">tweets</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <div class="brand-card-header bg-linkedin">
                    <i class="fa fa-linkedin"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-3" height="90"></canvas>
                    </div>
                  </div>
                  <div class="brand-card-body">
                    <div>
                      <div class="text-value">500+</div>
                      <div class="text-uppercase text-muted small">contacts</div>
                    </div>
                    <div>
                      <div class="text-value">292</div>
                      <div class="text-uppercase text-muted small">feeds</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <div class="brand-card-header bg-google-plus">
                    <i class="fa fa-google-plus"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-4" height="90"></canvas>
                    </div>
                  </div>
                  <div class="brand-card-body">
                    <div>
                      <div class="text-value">894</div>
                      <div class="text-uppercase text-muted small">followers</div>
                    </div>
                    <div>
                      <div class="text-value">92</div>
                      <div class="text-uppercase text-muted small">circles</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
           
          </div>
        </div>
      </main>
</body>
</html>