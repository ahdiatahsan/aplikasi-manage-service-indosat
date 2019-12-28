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

    <body style="background-color: #fff;">

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
                  <a href="tabel_laporan.php" class="active">
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

            <!-- data-tabel -->
            <div class="container-fluid datatable">

              <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered table-sm nowrap" width="100%" id="tabel">

                      <?php

                      if (isset($_POST['ambilData'])) {

                        $bulan = $_POST['bulan'];
                        $tahun = $_POST['tahun'];

                        $sql = mysqli_query($koneksi, "SELECT * FROM laporan_bln WHERE user_post = '$usernameSession' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
                      } elseif (empty($_POST['ambilData'])) {

                        $bulan = '';
                        $tahun = '';
                        $sql = mysqli_query($koneksi, "SELECT * FROM laporan_bln WHERE user_post = ''");
                      }
                      ?>

                      <div class="row">
                        <div class="col-xs-12">
                          <div class="col-lg-12" style="margin-left:-0.75rem;">
                            <img src="img/logo/persada2.png" alt="" style="display: inline-block;">
                            <h5 class="title centered">LAPORAN BULANAN MANAGE SERVICE</h5>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-xs-8 col-sm-2">
                          <div class="card" style="margin-top:5px; margin-bottom:3px; border-color: white;">
                            <p class="card-text">
                                  NAMA <span style="padding-left:1rem;"> : </span><?php echo $usernameSession; ?><br>
                                  NIK  <span style="padding-left:1.5rem;">  : </span><?php echo $nikSession; ?><br>

                                <form action="tabel_laporan.php" method="post" name="ambilData">
                                  PERIODE <span style="padding-left:0.45rem;"> </span>
                                  <!-- Bulan -->
                                  <select class="form-tanggal bulan" name="bulan">
                                    <option value="01">: Januari</option>
                                    <option value="02">: Februari</option>
                                    <option value="03">: Maret</option>
                                    <option value="04">: April</option>
                                    <option value="05">: Mei</option>
                                    <option value="06">: Juni</option>
                                    <option value="07">: Juli</option>
                                    <option value="08">: Agustus</option>
                                    <option value="09">: September</option>
                                    <option value="10">: Oktober</option>
                                    <option value="11">: November</option>
                                    <option value="12">: Desember</option>
                                  </select>

                                  <!-- Tahun -->
                                  <select class="form-tanggal tahun" name="tahun">
                                    <?php
                                    $mulai= date('Y') - 50;
                                    for($i = $mulai;$i<$mulai + 100;$i++){
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                      }
                                      ?>
                                  </select>

                                  <button type="submit" name="ambilData" class="ambilData"></button>

                                </form>
                            </p>
                          </div>
                        </div>

                        <div class="col-xs-4 col-sm-2">
                          <div class="card" style="margin-top:5px; margin-bottom:3px; border-color: white;">
                            <p class="card-text">
                              Lokasi <span style="padding-left:0.40rem;"> : </span><?php echo $lokasiSession; ?><br>
                              Devisi <span style="padding-left:0.49rem;"> : </span><?php echo $devisiSession; ?><br>
                              SPOC   <span style="padding-left:0.55rem;"> : </span><?php echo $spocSession; ?>
                            </p>
                          </div>
                        </div>
                      </div>

                        <thead>
                        <tr class="vendorListHeading">
                            <th rowspan="2">TANGGAL</th>
                            <th rowspan="2">HARI</th>
                            <th colspan="2">JAM</th>
                            <th rowspan="2">K/L</th>
                            <th rowspan="2">TIDAK HADIR</th>
                            <th rowspan="2">NAMA SITE</th>
                            <th rowspan="2">DESKRIPSI PEKERJAAN</th>
                            <th colspan="2">JAM AKTIFITAS</th>
                            <th colspan="6">JENIS AKTIFITAS</th>
                            <th colspan="2">JAM LEMBUR</th>
                            <th rowspan="2">NAMA SITE</th>
                            <th rowspan="2">DESKRIPSI PEKERJAAN</th>
                        </tr>
                        <tr class="vendorListHeading">
                            <th>DATANG</th>
                            <th>PULANG</th>
                            <th>MULAI</th>
                            <th>SELESAI</th>
                            <th>PREV</th>
                            <th>CUR</th>
                            <th>ADMN</th>
                            <th>MONITORING</th>
                            <th>P. DINAS</th>
                            <th>LMBR</th>
                            <th>MULAI</th>
                            <th>SELESAI</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                          <tr class="vendorListHeading">
                            <td>  <a href="./form_edit.php?id_data=<?php echo $row['id_data']; ?>">
                                  <?php echo $row['tanggal']; ?>
                                  </a>
                            </td>
                            <td><?php
                            $day = date('l', strtotime($row['tanggal']));
                            $dayList = array(
	                               'Sunday' => 'Minggu',
	                               'Monday' => 'Senin',
	                               'Tuesday' => 'Selasa',
	                               'Wednesday' => 'Rabu',
	                               'Thursday' => 'Kamis',
	                               'Friday' => 'Jumat',
	                               'Saturday' => 'Sabtu'
                            );echo $dayList[$day];
                            ?></td>
                            <td><?php echo $row['jam_datang']; ?></td>
                            <td><?php echo $row['jam_plng']; ?></td>
                            <td><?php echo $row['k_l']; ?></td>
                            <td><?php echo $row['tidak_hadir']; ?></td>
                            <td><?php echo $row['nama_site']; ?></td>
                            <td><?php echo $row['desk_kerja']; ?></td>
                            <td><?php echo $row['jam_mulai']; ?></td>
                            <td><?php echo $row['jam_selesai']; ?></td>
                            <td><?php echo $row['_prev']; ?></td>
                            <td><?php echo $row['_cur']; ?></td>
                            <td><?php echo $row['_admn']; ?></td>
                            <td><?php echo $row['_monitor']; ?></td>
                            <td><?php echo $row['_pdinas']; ?></td>
                            <td><?php echo $row['_lmbr']; ?></td>
                            <td><?php echo $row['lembur_mulai']; ?></td>
                            <td><?php echo $row['lembur_selesai']; ?></td>
                            <td><?php echo $row['nama_site2']; ?></td>
                            <td><?php echo $row['desk_lembur']; ?></td>
                          </tr>
                            <?php
                          }
                          ?>
                        </tbody>

                    </table>
                </div>
      		  	</div><!-- /row -->

              <div class="row"><!-- catatan -->

                <div class="col-sm-2 gap">
                  <table class="catatan">
                    <thead>
                      <th colspan="2">CATATAN &nbsp(TOTAL KEHADIRAN):</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Hari Kerja</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT tanggal FROM laporan_bln WHERE user_post = '$usernameSession' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $count = mysqli_num_rows($qry);
                            if ($count == 0) {
                                echo ": "."<u> 0 "." Hari</u>";
                            } else {
                                echo ": <u>".$count." Hari </u>";
                            }
                        ?></td>
                      </tr>
                      <tr>
                        <td>Izin</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT tidak_hadir FROM laporan_bln WHERE user_post = '$usernameSession' AND tidak_hadir = 'Izin' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $count = mysqli_num_rows($qry);
                            if ($count == 0) {
                                echo ": "."<u> 0 "." Hari</u>";
                            } else {
                                echo ": <u>".$count." Hari </u>";
                            }
                        ?></td>
                      </tr>
                      <tr>
                        <td>Sakit</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT tidak_hadir FROM laporan_bln WHERE user_post = '$usernameSession' AND tidak_hadir = 'Sakit' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $count = mysqli_num_rows($qry);
                            if ($count == 0) {
                                echo ": "."<u> 0 "." Hari</u>";
                            } else {
                                echo ": <u>".$count." Hari </u>";
                            }
                        ?></td>
                      </tr>
                      <tr>
                        <td>Cuti</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT tidak_hadir FROM laporan_bln WHERE user_post = '$usernameSession' AND tidak_hadir = 'Cuti' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $count = mysqli_num_rows($qry);
                            if ($count == 0) {
                                echo ": "."<u> 0 "." Hari</u>";
                            } else {
                                echo ": <u>".$count." Hari </u>";
                            }
                        ?></td>
                      </tr>
                      <tr>
                        <td>Mangkir</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT tidak_hadir FROM laporan_bln WHERE user_post = '$usernameSession' AND tidak_hadir = 'Mangkir' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $count = mysqli_num_rows($qry);
                            if ($count == 0) {
                                echo ": "."<u> 0 "." Hari</u>";
                            } else {
                                echo ": <u>".$count." Hari </u>";
                            }
                        ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="col-sm-2">
                  <table class="catatan">
                    <thead>
                      <th colspan="2">CATATAN &nbsp (TOTAL AKTIFITAS):</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Preventive</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT SUM(_prev) AS jumlah FROM laporan_bln WHERE user_post = '$usernameSession' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $data = mysqli_fetch_array($qry);
                            echo ": "."<u>".$data['jumlah']."</u>";
                        ?></td>
                      </tr>
                      <tr>
                        <td>Curative</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT SUM(_cur) AS jumlah FROM laporan_bln WHERE user_post = '$usernameSession' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $data = mysqli_fetch_array($qry);
                            echo ": "."<u>".$data['jumlah']."</u>";
                        ?></td>
                      </tr>
                      <tr>
                        <td>Admin</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT SUM(_admn) AS jumlah FROM laporan_bln WHERE user_post = '$usernameSession' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $data = mysqli_fetch_array($qry);
                            echo ": "."<u>".$data['jumlah']."</u>";
                        ?></td>
                      </tr>
                      <tr>
                        <td>Monitoring</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT SUM(_monitor) AS jumlah FROM laporan_bln WHERE user_post = '$usernameSession' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $data = mysqli_fetch_array($qry);
                            echo ": "."<u>".$data['jumlah']."</u>";
                        ?></td>
                      </tr>
                      <tr>
                        <td>Perj. Dinas</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT SUM(_pdinas) AS jumlah FROM laporan_bln WHERE user_post = '$usernameSession' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $data = mysqli_fetch_array($qry);
                            echo ": "."<u>".$data['jumlah']."</u>";
                        ?></td>
                      </tr>
                      <tr>
                        <td>Lembur</td>
                        <td><?php
                            $qry = mysqli_query($koneksi,"SELECT SUM(_lmbr) AS jumlah FROM laporan_bln WHERE user_post = '$usernameSession' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

                            $data = mysqli_fetch_array($qry);
                            echo ": "."<u>".$data['jumlah']."</u>";
                        ?></td>
                      </tr>
                    </tbody>
                </table>
              </div>

              <div class="col-xs-6 col-sm-1" style="margin-top:32px;">
                <div class="card" style="border-color: white;">
                  <p class="card-text centered">
                    Mengetahui <br>
                    SPOC <br>
                    <br>
                    <br>
                    <br>
                    <b><u><?php echo $spocSession; ?></u></b><br>
                    <b><?php echo $nikspocSession; ?></b>
                  </p>
                </div>
              </div>

              <div class="col-xs-4 col-sm-2" style="margin-top:20px;">
                <div class="card" style="border-color: white;">
                  <p class="card-text centered">
                    <input type="text" class="form-tanggal" style="margin-left:2px;">
                    <br>Dibuat oleh <br>
                    Karyawan Ybs, <br>
                    <br>
                    <br>
                    <br>
                    <b><u><?php echo $usernameSession; ?></b></u><br>
                    <b><?php echo $nikSession ?></b>
                  </p>
                </div>
              </div>

             </div><!-- /catatan -->

           </div><!-- /datatable -->

          </div><!-- /wrapper -->
        </div><!-- /main-content -->

      </section><!-- container -->

      <!-- javascript -->
      <script src="javascript/jquery-3.2.1.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/datatable/media/js/jquery.dataTables.min.js"></script>
      <script src="assets/datatable/media/js/dataTables.bootstrap4.min.js"></script>
      <script src="assets/datatable/extensions/Responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="assets/datatable/extensions/Scroller/js/dataTables.scroller.min.js"></script>
      <script src="javascript/jquery.dcjqaccordion.2.7.js"></script>
      <script src="assets/bootbox/bootbox.min.js"></script>
      <script src="javascript/common-script.js"></script>


      <!--datatable-->
      <script>
        $(document).ready(function () {
            $('#tabel').DataTable({
              "searching": false,
              "info": false,
              "paging": false,
              "pageLength": 31,
              "bLengthChange": false
            });
        });
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
