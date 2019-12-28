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
                  <a href="index.php">
                      <i class="fa fa-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

              <li class="sub-menu">
                  <a class="active" href="javascript:;" >
                      <i class="fa fa-tasks"></i>
                      <span>Forms</span>
                  </a>
                  <ul class="sub">
                      <li class="active"><a href="form_isi.php">Pengisian Data</a></li>
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

        </aside><!-- /sidebar -->

        <!-- main content -->
        <div id="main-content">
          <div class="wrapper">

            <!-- form -->
            <div class="row" style="margin-top: 25px;">
          		<div class="col-md-12">
                  <div class="form-container">
                  	  <h5 style="margin-bottom: 25px;"><i class="fa fa-angle-right"></i> Pengisian Data Laporan Bulanan</h5>

                      <form class="form-horizontal style-form" method="post" action="config/proses.php" name="tambahdataLaporan">

                          <input type="text" class="form-control" value="<?php echo $usernameSession; ?>" name="user_post" readonly hidden="true">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control" name="tanggal" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Datang</label>
                              <div class="col-sm-10">
                                  <input type="time" class="form-control" name="jam_datang">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Pulang</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="jam_plng" pattern="([0-2][0-9]:[0-5][0-9])">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">K/L</label>
                              <div class="col-sm-10">
                                <select class="custom-select form-control" name="k_l">
                                  <option value="K">Kerja (K)</option>
                                  <option value="L">Libur (L)</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tidak Hadir</label>
                              <div class="col-sm-10">
                                <select class="custom-select form-control" name="tidak_hadir">
                                    <option value=" "> </option>
                                    <option value="Izin">Izin (I)</option>
                                    <option value="Sakit">Sakit (S)</option>
                                    <option value="Cuti">Cuti (C)</option>
                                    <option value="Mangkir">Mangkir (MK)</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Site</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_site">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Deskripsi Pekerjaan</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="desk_kerja">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Aktifitas (Mulai)</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="jam_mulai" pattern="([0-2][0-9]:[0-5][0-9])">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Aktifitas (Selesai)</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="jam_selesai" pattern="([0-2][0-9]:[0-5][0-9])">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Aktifitas</label>
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="Preventive" value="1"> Preventive&nbsp&nbsp
                                  </label>
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="Curative" value="1"> Curative&nbsp&nbsp
                                  </label>
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="Admin" value="1"> Admin&nbsp&nbsp
                                  </label>
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="Monitoring" value="1"> Monitoring&nbsp&nbsp
                                  </label>
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="Perj_dinas" value="1"> Perj . Dinas&nbsp&nbsp
                                  </label>
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="Lembur" value="1" id="check_lembur"> Lembur&nbsp&nbsp
                                  </label>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Lembur (Mulai)</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lembur_mulai" pattern="([0-2][0-9]:[0-5][0-9])" id="input_lembur" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Lembur (Selesai)</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lembur_selesai" pattern="([0-2][0-9]:[0-5][0-9])" id="input_lembur1" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Site (Lembur)</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_site2" id="input_lembur2" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Deskripsi Pekerjaan (Lembur)</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="desk_lembur" id="input_lembur3" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-primary" name="tambahdataLaporan" style="float: right;">Submit</button>
                            </div>
                          </div>
                      </form>

                  </div>
          		</div><!-- col-lg-12-->
          	</div><!-- /row -->

          </div><!-- /wrapper -->
        </div><!-- /main-content -->

        <!-- footer -->
        <footer class="site-footer">
            <div class="centered">
                Indosat Ooredoo © 2017 All Right Reserved &nbsp//&nbsp ahdiat_ahsan
            </div>
        </footer><!-- /footer -->

      </section><!-- /container -->

      <!-- javascript -->
      <script src="javascript/jquery-3.2.1.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="javascript/jquery.dcjqaccordion.2.7.js"></script>
      <script src="assets/bootbox/bootbox.min.js"></script>
      <script src="javascript/common-script.js"></script>

      <!-- check lembur -->
      <script>
        document.getElementById('check_lembur').onchange = function() {
          document.getElementById('input_lembur').disabled = !this.checked;
          document.getElementById('input_lembur1').disabled = !this.checked;
          document.getElementById('input_lembur2').disabled = !this.checked;
          document.getElementById('input_lembur3').disabled = !this.checked;
        };
      </script>

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
