<?php
include "./koneksi.php";

//todo register user
if (isset($_POST['tambahUser'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $nik = $_POST['nik'];
  $lokasi = $_POST['lokasi'];
  $devisi = $_POST['devisi'];
  $spoc = $_POST['spoc'];
  $nik_spoc = $_POST['nik_spoc'];

  $sql = "INSERT INTO users VALUES (NULL, '$username', '$password', '$nik', '$lokasi', '$devisi', '$spoc', '$nik_spoc')";

  if ($koneksi->query($sql) == true) {
    header("location:../login.php");
  } else {
    echo "error :";
  //TAMPILKAN NAMA NOMOR DAN DESKRIPSI ERRORNYA
  echo mysqli_errno($koneksi)." : ";
  echo mysqli_error($koneksi);
  }

//todo edit profil
}elseif (isset($_POST['editProfil'])) {

  $id_user = $_POST['id_user'];
  $username2 = $_POST['username2'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nik = $_POST['nik'];
  $lokasi = $_POST['lokasi'];
  $devisi = $_POST['devisi'];
  $spoc = $_POST['spoc'];
  $nik_spoc = $_POST['nik_spoc'];

  $sql ="UPDATE users SET username='$username', password='$password', nik='$nik', lokasi='$lokasi', devisi='$devisi', spoc='$spoc', nik_spoc='$nik_spoc' WHERE id_user = '$id_user'";

  $sql2 ="UPDATE laporan_bln SET user_post='$username' WHERE user_post='$username2'";

  if ($koneksi->query($sql) == true AND $koneksi->query($sql2) == true) {
    session_destroy();
    header("location:../logout.php");
  } else {
    echo "error :";
  //TAMPILKAN NAMA NOMOR DAN DESKRIPSI ERRORNYA
  echo mysqli_errno($koneksi)." : ";
  echo mysqli_error($koneksi);
  }

//todo tambah data laporan bln
} elseif (isset($_POST['tambahdataLaporan'])) {

    $user_post = $_POST['user_post'];
    $tanggal = $_POST['tanggal'];
    $jam_datang = $_POST['jam_datang'];
    $jam_plng = $_POST['jam_plng'];
    $k_l = $_POST['k_l'];
    $tidak_hadir = $_POST['tidak_hadir'];
    $nama_site = $_POST['nama_site'];
    $desk_kerja = $_POST['desk_kerja'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $prev = $_POST['Preventive'];
    $cur = $_POST['Curative'];
    $admn = $_POST['Admin'];
    $mntr = $_POST['Monitoring'];
    $pdinas = $_POST['Perj_dinas'];
    $lmbr = $_POST['Lembur'];
    $lmbr_mulai = $_POST['lembur_mulai'];
    $lmbr_selesai = $_POST['lembur_selesai'];
    $nama_site2 = $_POST['nama_site2'];
    $desk_lembur = $_POST['desk_lembur'];

    $sql = "INSERT INTO laporan_bln VALUES (NULL, '$user_post', '$tanggal', '$jam_datang', '$jam_plng', '$k_l', '$tidak_hadir', '$nama_site', '$desk_kerja', '$jam_mulai', '$jam_selesai', '$prev', '$cur', '$admn', '$mntr', '$pdinas', '$lmbr', '$lmbr_mulai', '$lmbr_selesai', '$nama_site2', '$desk_lembur')";

    if ($koneksi->query($sql) == true) {
      header("location:../tabel_laporan.php");
    } else {
      echo "error :";
	  //TAMPILKAN NAMA NOMOR DAN DESKRIPSI ERRORNYA
	  echo mysqli_errno($koneksi)." : ";
	  echo mysqli_error($koneksi);
    }

//todo edit data laporan bln
} else if (isset($_POST['editData'])) {

    $iddata = $_POST['id_data'];
    $user_post = $_POST['user_post'];
    $tanggal = $_POST['tanggal'];
    $jam_datang = $_POST['jam_datang'];
    $jam_plng = $_POST['jam_plng'];
    $k_l = $_POST['k_l'];
    $tidak_hadir = $_POST['tidak_hadir'];
    $nama_site = $_POST['nama_site'];
    $desk_kerja = $_POST['desk_kerja'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $prev = $_POST['Preventive'];
    $cur = $_POST['Curative'];
    $admn = $_POST['Admin'];
    $mntr = $_POST['Monitoring'];
    $pdinas = $_POST['Perj_dinas'];
    $lmbr = $_POST['Lembur'];
    $lmbr_mulai = $_POST['lembur_mulai'];
    $lmbr_selesai = $_POST['lembur_selesai'];
    $nama_site2 = $_POST['nama_site2'];
    $desk_lembur = $_POST['desk_lembur'];

    $sql ="UPDATE laporan_bln SET id_data = '$iddata', user_post = '$user_post', tanggal = '$tanggal', jam_datang = '$jam_datang', jam_plng = '$jam_plng', k_l = '$k_l', tidak_hadir = '$tidak_hadir', nama_site = '$nama_site', desk_kerja = '$desk_kerja', jam_mulai = '$jam_mulai', jam_selesai = '$jam_selesai', _prev = '$prev', _cur = '$cur', _admn = '$admn', _monitor = '$mntr', _pdinas = '$pdinas', _lmbr = '$lmbr', lembur_mulai = '$lmbr_mulai', lembur_selesai = '$lmbr_selesai', nama_site2 = '$nama_site2', desk_lembur = '$desk_lembur' WHERE id_data = '$iddata'";

    if ($koneksi->query($sql) == true) {
        header("location:../tabel_laporan.php");
      } else {
        echo "error :";
      //TAMPILKAN NAMA NOMOR DAN DESKRIPSI ERRORNYA
      echo mysqli_errno($koneksi)." : ";
      echo mysqli_error($koneksi);
      }


//todo hapus data laporan
} else if (isset($_GET['hapusData'])) {

    $iddata = $_GET['hapusData'];
    $sql = "DELETE FROM laporan_bln WHERE id_data = '$iddata'";

    if ($koneksi->query($sql) == true) {
        header("location:../tabel_laporan.php");
      } else {
        echo "error :";
      //TAMPILKAN NAMA NOMOR DAN DESKRIPSI ERRORNYA
      echo mysqli_errno($koneksi)." : ";
      echo mysqli_error($koneksi);
      }
}

?>
