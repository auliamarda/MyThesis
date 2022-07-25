<?php
include 'koneksi.php'; //konfigurasi dengan koneksi.php

$username = $_POST['username']; //ambil data post dari index untuk dijadikan variabel $username
$password = md5($_POST['password']); //membaca format password dengan hash md5

$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE user='$username' AND pass='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){ //memberikan session pada variabel username dan status login
	session_start();
	$_SESSION['username'] = $username;
    $_SESSION['status'] = "login";

    header("location:utama.php");
}else{
	header("location:index.php");
}
?>