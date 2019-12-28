<?php
include "./config/koneksi.php";
session_start();
//cek session
$usernameSession = $_SESSION['user_login'];
$nikSession = $_SESSION['user_nik'];
$lokasiSession = $_SESSION['user_lokasi'];
$devisiSession = $_SESSION['user_devisi'];
$spocSession = $_SESSION['user_spoc'];
$nikspocSession = $_SESSION['nik_spoc'];
$sql = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$usernameSession'");
$row = mysqli_fetch_assoc($sql);
$loginSession = $row['username'];
?>
