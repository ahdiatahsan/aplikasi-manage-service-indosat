<?php
  $koneksi = mysqli_connect("localhost", "root", "", "service_manage");

  if ($koneksi->connect_error) {
    echo "Koneksi Gagal!";
  }
?>
