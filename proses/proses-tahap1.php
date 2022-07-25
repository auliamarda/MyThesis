<?php
//Tahap 1 : Menghitung Jumlah Class/Label
$lunas = mysqli_query($koneksi, "SELECT COUNT(*) AS lunas FROM data_train WHERE label='lunas'") or die (mysql_error());
$h_lunas = mysqli_fetch_array($lunas);

$menunggak = mysqli_query($koneksi, "SELECT COUNT(*) AS menunggak FROM data_train WHERE label='menunggak'") or die (mysql_error());
$h_menunggak = mysqli_fetch_array($menunggak);
?>