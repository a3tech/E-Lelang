<!DOCTYPE html>
<html lang="en">
<head>
 <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
	<title></title>
	 <!-- Icons-->
    <link href="asset/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="asset/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="asset/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="asset/css/style.css" rel="stylesheet">
    <link href="asset/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="../upload1/e-lelang_logo.jpg" width="89" height="25" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="upload/img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
          <a class="nav-link" href="penjual.php">Selamat Datang <?php echo $username ?></a>
        </li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="upload/icon.png" alt="admin@bootstrapmaster.com">
          </a>
               <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
              <strong>Account</strong>
            </div>
            <a class="dropdown-item" href="#">
              <i class="fa fa-bell-o"></i> Updates
              <span class="badge badge-info">42</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-envelope-o"></i> Pesan Masuk
              <span class="badge badge-success">42</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-comments"></i> Komentar
              <span class="badge badge-warning">42</span>
            </a>
            <div class="dropdown-header text-center">
              <strong>Settings</strong>
            </div>
            <a class="dropdown-item" href="#">
              <i class="fa fa-user"></i> Profile</a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-wrench"></i> Settings</a>
            <div class="divider"></div>
            <a class="dropdown-item" href="../logout.php">
              <i class="fa fa-lock"></i> Logout</a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="penjual.php">
                <i class="nav-icon icon-speedometer"></i> Dashboard
              </a>
            </li>
            
            <li class="nav-title">Fitur Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="module/barang_tambah.php">
                <i class="nav-icon icon-plus"></i>Lelang Barang</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="module/barang.php">
                <i class="nav-icon icon-note"></i>Data Barang Lelang</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="module/feedback.php">
                <i class="nav-icon icon-emotsmile"></i>Data Feedback</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="module/pesan_tambah.php">
                <i class="nav-icon fa fa-address-card"></i>Kirim Pesan Privat</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="module/pesan.php">
                <i class="nav-icon fa fa-envelope-open"></i>Pesan Masuk</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="module/pemenang.php">
                <i class="nav-icon fa fa-user-o"></i>Cek Pemenang Lelang</a>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
</body>
</html>