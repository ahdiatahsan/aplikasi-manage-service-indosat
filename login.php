<?php
session_start();
if (isset($_SESSION['user_login'])){
 header("location:./index.php");
}
?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>

        <!-- CSS -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
		    <link rel="stylesheet" href="css/form-elements.css">
        <link rel="stylesheet" href="css/style-login.css">

        <!-- Icon -->
        <link rel="icon" href="img/logo/logo_indosat1.png" style="width:100%;">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-12 col-sm-offset-2 texttitle">
                            <h1 align="center"><strong>Indosat Manage Service</strong></h1>
                            <div class="description">
                            	<p>
	                            	Jl. Basuki Rahmat, Birobuli Utara, Palu Sel., Kota Palu, Sulawesi Tengah 94111 //
                                <a href="https://indosatooredoo.com/id/personal" target="_blank"><img src="img/logo/logo_indosat1.png"></a>
                            	</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 offset-sm-1">

                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login</h3>
	                            	<p>Masukkan username dan password :</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                           </div>
	                            <div class="form-bottom">
				                         <form role="form" action="" method="post" class="login-form">
				                    	      <div class="form-group">
				                    		      <label class="sr-only" for="username">Username</label>
				                        	    <input type="text" name="username" placeholder="Username / Nama Lengkap" class="form-control" autocomplete="off" required>
				                            </div>
				                            <div class="form-group">
				                        	    <label class="sr-only" for="password">Password</label>
				                        	    <input type="password" name="password" placeholder="Password" class="form-control" required>
				                            </div>
                                    <?php
                                    include "config/koneksi.php";

                                    if (isset($_POST['kirim'])) {
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
                                        $row = mysqli_fetch_assoc($sql);
                                        $count = mysqli_num_rows($sql);

                                        if ($count == 1) {
                                            session_start();
                                            $_SESSION['user_login'] = $username;
                                            $_SESSION['user_nik'] = $row['nik'];
                                            $_SESSION['user_lokasi'] = $row['lokasi'];
                                            $_SESSION['user_devisi'] = $row['devisi'];
                                            $_SESSION['user_spoc'] = $row['spoc'];
                                            $_SESSION['nik_spoc'] = $row['nik_spoc'];
                                            header("location:./index.php");
                                        } else {
                                            echo "<div class='row'>
                                                     <div class='alert alert-danger alert-dismissible fade in col-sm-8 offset-sm-2' role='alert'>
                                                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                     </button>
                                                  <strong class='text-lg-center'><i class='fa fa-times'></i> Username / Password Salah</strong>
                                                  </div>
                                                  </div>";
                                        }
                                    }
                                    ?>

				                              <button type="submit" value="login" class="btn" name="kirim">Sign in!</button>
				                         </form>
			                        </div>
		                       </div>

                        </div>

                        <div class="col-sm-5">

                        	<div class="form-box">
                        		<div class="form-top">
	                        		   <div class="form-top-left">
	                        			    <h3>Sign Up</h3>
	                            		  <p>Masukkan data diri untuk membuat akun:</p>
	                        		   </div>
	                        		   <div class="form-top-right">
	                        			    <i class="fa fa-pencil"></i>
	                        		   </div>
	                          </div>
	                          <div class="form-bottom">
				                    <form role="form" action="./config/proses.php" method="post" class="registration-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="">Username</label>
				                        	<input type="text" name="username" placeholder="Nama Lengkap" class="form-control" autocomplete="off" required>
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="">Password</label>
				                        	<input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" required>
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">NIK</label>
				                        	<input type="text" name="nik" placeholder="NIK" class="form-control" autocomplete="off" required>
				                        </div>
                                <div class="form-group">
				                        	<label class="sr-only" for="form-email">Lokasi</label>
				                        	<input type="text" name="lokasi" placeholder="Lokasi" class="form-control" autocomplete="off" required>
				                        </div>
                                <div class="form-group">
				                        	<label class="sr-only" for="form-email">Devisi</label>
				                        	<input type="text" name="devisi" placeholder="Divisi" class="form-control" autocomplete="off" required>
				                        </div>
                                <div class="form-group">
				                        	<label class="sr-only" for="form-email">SPOC</label>
				                        	<input type="text" name="spoc" placeholder="SPOC" class="form-control" autocomplete="off" required>
				                        </div>
                                <div class="form-group">
				                        	<label class="sr-only" for="form-email">NIK SPOC</label>
				                        	<input type="text" name="nik_spoc" placeholder="NIK SPOC" class="form-control" autocomplete="off" required>
				                        </div>
				                        <div class="form-group">
				                        	<label><input type="checkbox" class="checkbox1" required> Saya setuju membuat akun ini</label>
				                        </div>
				                        <button type="submit" class="btn" name="tambahUser">Sign Up!</button>
				                    </form>
			                      </div>
                          </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">

        			<div class="col-sm-12">
        				<div class="footer-bottom"></div>
        				<p>© PT Indosat Tbk.</p>
        			</div>

        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="javascript/jquery-3.2.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="javascript/jquery.backstretch.min.js"></script>
        <script src="javascript/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>
</html>
