<?php
include "./config/koneksi.php";
include "./session_.php";
if (!isset($_SESSION['user_login'])) {
    header("location:./login.php");
}
?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Indosat Manage Service</title>

        <!-- css -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mainstyle.css">
        <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/leaflet/leaflet.css">

        <!-- icon -->
        <link rel="icon" href="img/logo/logo_indosat1.png">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

      <section id="container">

        <!-- header start -->
        <header class="header black-bg">
          <div class="container-fluid">

          <div class="row">

            <div class="sidebar-toggle-box">
              <span class="fa fa-bars"></span>
            </div>
            <!-- logo start -->
            <div class="logo"><b>Indosat Manage Service</b></div>

            <!-- logout -->
            <span class="navbar-text float-xs-right">
            <a href="./logout.php" class="text-white btn btn-danger btn-sm" style="margin-left: 20px; margin-top:8px;" id="logout">
              <i class="fa fa-sign-out"></i>Logout</a>
            </span>

          </div>

          </div>
        </header><!-- /header -->

        <!-- sidebar -->
        <aside>

          <div id="sidebar" class="nav-collapse">

            <ul class="sidebar-menu" id="accordion">

              <p class="centered" ><a href="profile.html"><img src="img/logo/user.png" class="img-circle" width="80"></a></p>
              <h6 class="centered"><?php echo $usernameSession; ?></h6>

              <li style="margin-top: 35px;">
                  <a class="active" href="javascript:;">
                      <i class="fa fa-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" >
                      <i class="fa fa-tasks"></i>
                      <span>Forms</span>
                  </a>
                  <ul class="sub">
                      <li><a href="form_isi.php">Pengisian Data</a></li>
                      <li><a href="form_edit.php">Edit Data</a></li>
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="tabel_laporan.php">
                      <i class="fa fa-th"></i>
                      <span>Tabel Laporan</span>
                  </a>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" >
                      <i class="fa fa-cogs"></i>
                      <span>Pengaturan</span>
                  </a>
                  <ul class="sub">
                      <li><a href="edit_profil.php">Edit Profil</a></li>
                      <li><a href="http://localhost/phpmyadmin/sql.php?server=1&db=service_manage&table=laporan_bln&pos=0">Akses Database</a></li>
                  </ul>
              </li>

            </ul>

          </div>

        </aside><!-- sidebar -->

        <!-- main content -->
        <div id="main-content">
          <div class="wrapper">

            <!-- card -->
            <div class="row">


              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card card-1">
                  <div class="card-block info-box">
                    <i class="fa fa-users"></i>
        						<div class="count">
                      <?php
                        $qry = mysqli_query($koneksi,"SELECT id_user FROM users");
                        $count = mysqli_num_rows($qry);
                        if ($count == 0) {
                          echo "0";
                        }
                        else {
                          echo $count;
                        }
                      ?>
                    </div>
        						<div class="title">Users</div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card card-2">
                  <div class="card-block info-box">
                    <i class="fa fa-hdd-o"></i>
                    <div class="count">
                      <?php
                      $qry = mysqli_query($koneksi,"SELECT id_data FROM laporan_bln");
                      $count = mysqli_num_rows($qry);
                      if ($count == 0) {
                        echo "0";
                      }
                      else {
                        echo $count;
                      }
                      ?>
                    </div>
                    <div class="title">Jumlah Data</div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card card-3">
                  <div class="card-block info-box">
                    <p class="card-text centered" style="margin-top:20px;">
                      <a href="https://indosatooredoo.com/id/personal" target="_blank"><img src="./img/logo/logo_indosat2.png" alt=""></a></p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card card-4">
                  <div class="card-block info-box">
                    <h6 class="centered"><b>Mobile Responsive</b></h6>
                    <p class="card-text centered" style="margin-top:20px;">
                      <a href="https://indosatooredoo.com/id/personal" target="_blank"><img src="./img/logo/MobileDevices.png" alt=""></a></p>
                  </div>
                </div>
              </div>

            </div><!-- card -->

            <!-- lokasi&sosial-media -->
            <div class="row">
              <div class="col-sm-8">
                <div class="card text-center">
                    <div class="card-header">
                      Lokasi Gerai Indosat Ooredoo Palu
                    </div>
                    <div class="card-block " id="mapcontainer">
                    </div>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-header">
                      Indosat Ooredoo Sosial Media
                    </div>
                    <div class="card-block card-media-sosial">
                      <div class="col-sm-12">

                      Dapatkan berita terbaru dari Indosat Ooredoo dengan mengikuti social media kami :
                      <hr>

                      <span>
                        <a href="https://www.facebook.com/IM3Ooredoo/" target="_blank">
                          <img src="img\social\facebook.png" alt="">
                        </a>
                      </span>

                      <span>
                        <a href="https://www.youtube.com/user/ptindosat" target="_blank">
                          <img src="img\social\youtube.png" alt="">
                        </a>
                      </span>

                      <span>
                        <a href="https://twitter.com/im3ooredoo" target="_blank">
                          <img src="img\social\twitter.png" alt="">
                        </a>
                      </span>

                      <span>
                        <a href="https://www.instagram.com/im3ooredoo/" target="_blank">
                          <img src="img\social\instagram.png" alt="">
                        </a>
                      </span>

                      </div>
                    </div>
                </div>
              </div>
            </div><!-- /lokasi&sosial-media -->

          </div><!-- /wrapper -->
        </div><!-- /main-content -->


        <!-- footer -->
        <footer class="site-footer">
            <div class="centered">
                Indosat Ooredoo © 2017 All Right Reserved &nbsp//&nbsp ahdiat_ahsan
            </div>
        </footer><!-- /footer -->

      </section><!-- container -->

      <!-- javascript -->
      <script src="javascript/jquery-3.2.1.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="javascript/jquery.dcjqaccordion.2.7.js"></script>
      <script src="assets/leaflet/leaflet.js"></script>
      <script src="assets/bootbox/bootbox.min.js"></script>
      <script src="javascript/common-script.js"></script>

      <!-- logout -->
      <script>
          $(document).on("click", "#logout", function (e) {
              var link = $(this).attr("href"); // mendapatkan link yang dimaksud
              e.preventDefault();
              bootbox.confirm("<h4><i class='fa fa-sign-out'></i> Logout ?<h4>", function (result) {
                  if (result) {
                      document.location.href = link;  // jika di klik ok maka menuju link pada atribut href
                  }
              });
          });
      </script>

    </body>
</html>
