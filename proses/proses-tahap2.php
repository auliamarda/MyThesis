<?php
//Tahap 1 : Menghitung Jumlah Class/Label
$lunas = mysqli_query($koneksi, "SELECT COUNT(*) AS lunas FROM data_train WHERE label='lunas'") or die (mysql_error());
$h_lunas = mysqli_fetch_array($lunas);

$menunggak = mysqli_query($koneksi, "SELECT COUNT(*) AS menunggak FROM data_train WHERE label='menunggak'") or die (mysql_error());
$h_menunggak = mysqli_fetch_array($menunggak);

//Tahap 2 : Menghitung Jumlah Kasus yang sama dengan class yang sama
//UMUR
$umur1 = mysqli_query($koneksi, "SELECT COUNT(*) AS umur1 FROM data_train WHERE umur='$umur' AND ket='Tidak Ada'") or die (mysql_error());
$h_umur1 = mysqli_fetch_array($umur1);
$umur2 = mysqli_query($koneksi, "SELECT COUNT(*) AS umur2 FROM data_train WHERE umur='$umur' AND ket='Ada'") or die (mysql_error());
$h_umur2 = mysqli_fetch_array($umur2);
if ($h_umur1['umur1'] == 0 OR $h_umur2['umur2'] == 0){
	$sql = mysqli_query($koneksi, "SELECT COUNT(*) AS a FROM data_train WHERE umur='$umur'") or die (mysql_error());
	$dt = mysqli_fetch_array($sql);
	$h_umur = ($h_umur1['umur1'] + 1) / ($h_tidak['tidak'] + $dt['a']);
	$h_umur1 = ($h_umur2['umur2'] + 1) / ($h_ada['ada'] + $dt['a']);
}else{
	$h_umur = $h_umur1['umur1'] / $h_tidak['tidak'];
	$h_umur1 = $h_umur2['umur2'] / $h_ada['ada'];
}

//JK
$jk1 = mysqli_query($koneksi, "SELECT COUNT(*) AS jk1 FROM data_train WHERE jk='$jk' AND ket='Tidak Ada'") or die (mysql_error());
$h_jk1 = mysqli_fetch_array($jk1);
$jk2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jk2 FROM data_train WHERE jk='$jk' AND ket='Ada'") or die (mysql_error());
$h_jk2 = mysqli_fetch_array($jk2);
if ($h_jk1['jk1'] == 0 OR $h_jk2['jk2'] == 0){
	$sql1 = mysqli_query($koneksi, "SELECT COUNT(*) AS b FROM data_train WHERE jk='$jk'") or die (mysql_error());
	$dt1 = mysqli_fetch_array($sql1);
	$h_jk = ($h_jk1['jk1'] + 1) / ($h_tidak['tidak'] + $dt1['b']);
	$h_jk1 = ($h_jk2['jk2'] + 1) / ($h_ada['ada'] + $dt1['b']);
}else{
	$h_jk = $h_jk1['jk1'] / $h_tidak['tidak'];
	$h_jk1 = $h_jk2['jk2'] / $h_ada['ada'];;
}

//Tipe Nyeri
$nyeri1 = mysqli_query($koneksi, "SELECT COUNT(*) AS nyeri1 FROM data_train WHERE tipe_nyeri='$nyeri' AND ket='Tidak Ada'") or die (mysql_error());
$h_nyeri1 = mysqli_fetch_array($nyeri1);
$nyeri2 = mysqli_query($koneksi, "SELECT COUNT(*) AS nyeri2 FROM data_train WHERE tipe_nyeri='$nyeri' AND ket='Ada'") or die (mysql_error());
$h_nyeri2 = mysqli_fetch_array($nyeri2);
if ($h_nyeri1['nyeri1'] == 0 OR $h_nyeri2['nyeri2'] == 0 ){
	$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS c FROM data_train WHERE tipe_nyeri='$nyeri'") or die (mysql_error());
	$dt2 = mysqli_fetch_array($sql2);
	$h_nyeri = ($h_nyeri1['nyeri1'] + 1) / ($h_tidak['tidak'] + $dt2['c']);
	$h_nyeri1 = ($h_nyeri2['nyeri2'] + 1) / ($h_ada['ada'] + $dt2['c']);
}else{
	$h_nyeri = $h_nyeri1['nyeri1'] / $h_tidak['tidak'];
	$h_nyeri1 = $h_nyeri2['nyeri2'] / $h_ada['ada'];
}

//Tekanan Darah
$darah1 = mysqli_query($koneksi, "SELECT COUNT(*) AS darah1 FROM data_train WHERE tekanan_darah='$darah' AND ket='Tidak Ada'") or die (mysql_error());
$h_darah1 = mysqli_fetch_array($darah1);
$darah2 = mysqli_query($koneksi, "SELECT COUNT(*) AS darah2 FROM data_train WHERE tekanan_darah='$darah' AND ket='Ada'") or die (mysql_error());
$h_darah2 = mysqli_fetch_array($darah1);
if ($h_darah1['nyeri1'] == 0 OR $h_darah2['nyeri2'] == 0){
	$sql3 = mysqli_query($koneksi, "SELECT COUNT(*) AS d FROM data_train WHERE tekanan_darah='$darah'") or die (mysql_error());
	$dt3 = mysqli_fetch_array($sql3);
	$h_darah = ($h_darah1['darah1'] + 1) / ($h_tidak['tidak'] + $dt3['d']);
	$h_darah1 = ($h_darah2['darah2'] + 1) / ($h_ada['ada'] + $dt3['d']);
}else{
	$h_darah = $h_darah1['darah1'] / $h_tidak['tidak'];
	$h_darah1 = $h_darah2['darah2'] / $h_ada['ada'];
}

//Kolesterol
$koles1 = mysqli_query($koneksi, "SELECT COUNT(*) AS koles1 FROM data_train WHERE kolesterol='$koles' AND ket='Tidak Ada'") or die (mysql_error());
$h_koles1 = mysqli_fetch_array($koles1);
$koles2 = mysqli_query($koneksi, "SELECT COUNT(*) AS koles2 FROM data_train WHERE kolesterol='$koles' AND ket='Ada'") or die (mysql_error());
$h_koles2 = mysqli_fetch_array($koles2);
if ($h_koles1['koles1'] == 0 OR $h_koles2['koles2'] == 0){
	$sql4 = mysqli_query($koneksi, "SELECT COUNT(*) AS e FROM data_train WHERE kolesterol='$koles'") or die (mysql_error());
	$dt4 = mysqli_fetch_array($sql4);
	$h_koles = ($h_koles1['koles1'] + 1) / ($h_tidak['tidak'] + $dt4['e']);
	$h_koles1 = ($h_koles2['koles2'] + 1) / ($h_ada['ada'] + $dt4['e']);
}else{
	$h_koles = $h_koles1['koles1'] / $h_tidak['tidak'];
	$h_koles1 = $h_koles2['koles2'] / $h_ada['ada'];
}

//Gula Darah
$gula1 = mysqli_query($koneksi, "SELECT COUNT(*) AS gula1 FROM data_train WHERE gula_darah='$gula' AND ket='Tidak Ada'") or die (mysql_error());
$h_gula1 = mysqli_fetch_array($gula1);
$gula2 = mysqli_query($koneksi, "SELECT COUNT(*) AS gula2 FROM data_train WHERE gula_darah='$gula' AND ket='Ada'") or die (mysql_error());
$h_gula2 = mysqli_fetch_array($gula2);
if ($h_gula1['gula1'] == 0 OR $h_gula2['gula2'] == 0){
	$sql5 = mysqli_query($koneksi, "SELECT COUNT(*) AS f FROM data_train WHERE gula_darah='$gula'") or die (mysql_error());
	$dt5 = mysqli_fetch_array($sql5);
	$h_gula = ($h_gula1['gula1'] + 1) / ($h_tidak['tidak'] + $dt5['f']);
	$h_gula1 = ($h_gula2['gula2'] + 1) / ($h_ada['ada'] + $dt5['f']);
}else{
	$h_gula = $h_gula1['gula1'] / $h_tidak['tidak'];
	$h_gula1 = $h_gula2['gula2'] / $h_ada['ada'];
}

//Elektrokardiografi
$elektro1 = mysqli_query($koneksi, "SELECT COUNT(*) AS elektro1 FROM data_train WHERE elektro='$elektro' AND ket='Tidak Ada'") or die (mysql_error());
$h_elektro1 = mysqli_fetch_array($elektro1);
$elektro2 = mysqli_query($koneksi, "SELECT COUNT(*) AS elektro2 FROM data_train WHERE elektro='$elektro' AND ket='Ada'") or die (mysql_error());
$h_elektro2 = mysqli_fetch_array($elektro2);
if ($h_elektro1['elektro1'] == 0 OR $h_elektro2['elektro2'] == 0){
	$sql6 = mysqli_query($koneksi, "SELECT COUNT(*) AS g FROM data_train WHERE elektro='$elektro'") or die (mysql_error());
	$dt6 = mysqli_fetch_array($sql6);
	$h_elektro = ($h_elektro1['elektro1'] + 1) / ($h_tidak['tidak'] + $dt6['g']);
	$h_elektro1 = ($h_elektro2['elektro2'] + 1) / ($h_ada['ada'] + $dt6['g']);
}else{
	$h_elektro = $h_elektro1['elektro1'] / $h_tidak['tidak'];
	$h_elektro1 = $h_elektro2['elektro2'] / $h_ada['ada'];
}

//Detak Jantung
$jantung1 = mysqli_query($koneksi, "SELECT COUNT(*) AS jantung1 FROM data_train WHERE detak_jantung='$jantung' AND ket='Tidak Ada'") or die (mysql_error());
$h_jantung1 = mysqli_fetch_array($jantung1);
$jantung2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jantung2 FROM data_train WHERE detak_jantung='$jantung' AND ket='Ada'") or die (mysql_error());
$h_jantung2 = mysqli_fetch_array($jantung2);
if ($h_jantung1['jantung1'] == 0 OR $h_jantung2['jantung2'] == 0){
	$sql7 = mysqli_query($koneksi, "SELECT COUNT(*) AS h FROM data_train WHERE etak_jantung='$jantung'") or die (mysql_error());
	$dt7 = mysqli_fetch_array($sql7);
	$h_jantung = ($h_jantung1['jantung1'] + 1) / ($h_tidak['tidak'] + $dt7['h']);
	$h_jantung1 = ($h_jantung2['jantung2'] + 1) / ($h_ada['ada'] + $dt7['h']);
}else{
	$h_jantung = $h_jantung1['jantung1'] / $h_tidak['tidak'];
	$h_jantung1 = $h_jantung2['jantung2'] / $h_ada['ada'];
}

//Angina
$angina1 = mysqli_query($koneksi, "SELECT COUNT(*) AS angina1 FROM data_train WHERE angina='$angina' AND ket='Tidak Ada'") or die (mysql_error());
$h_angina1 = mysqli_fetch_array($angina1);
$angina2 = mysqli_query($koneksi, "SELECT COUNT(*) AS angina2 FROM data_train WHERE angina='$angina' AND ket='Ada'") or die (mysql_error());
$h_angina2 = mysqli_fetch_array($angina2);
if ($h_angina1['angina1'] == 0 OR $h_angina2['angina2'] == 0){
	$sql8 = mysqli_query($koneksi, "SELECT COUNT(*) AS i FROM data_train WHERE angina='$angina'") or die (mysql_error());
	$dt8 = mysqli_fetch_array($sql8);
	$h_angina = ($h_angina1['angina1'] + 1) / ($h_tidak['tidak'] + $dt8['i']);
	$h_angina1 = ($h_angina2['angina2'] + 1) / ($h_ada['ada'] + $dt8['i']);
}else{
	$h_angina = $h_angina1['angina1'] / $h_tidak['tidak'];
	$h_angina1 = $h_angina2['angina2'] / $h_ada['ada'];
}

//OldPeak
$old1 = mysqli_query($koneksi, "SELECT COUNT(*) AS old1 FROM data_train WHERE oldpeak='$oldpeak' AND ket='Tidak Ada'") or die (mysql_error());
$h_old1 = mysqli_fetch_array($old1);
$old2 = mysqli_query($koneksi, "SELECT COUNT(*) AS old2 FROM data_train WHERE oldpeak='$oldpeak' AND ket='Ada'") or die (mysql_error());
$h_old2 = mysqli_fetch_array($old2);
if ($h_old1['old1'] == 0 OR $h_old2['old2'] == 0){
	$sql9 = mysqli_query($koneksi, "SELECT COUNT(*) AS j FROM data_train WHERE oldpeak='$oldpeak'") or die (mysql_error());
	$dt9 = mysqli_fetch_array($sql9);
	$h_old = ($h_old1['old1'] + 1) / ($h_tidak['tidak'] + $dt9['j']);
	$h_old1 = ($h_old2['old2'] + 1) / ($h_ada['ada'] + $dt9['j']);
}else{
	$h_old = $h_old1['old1'] / $h_tidak['tidak'];
	$h_old1 = $h_old2['old2'] / $h_ada['ada'];
}

//Segmen
$segmen1 = mysqli_query($koneksi, "SELECT COUNT(*) AS segmen1 FROM data_train WHERE segmen='$segmen' AND ket='Tidak Ada'") or die (mysql_error());
$h_segmen1 = mysqli_fetch_array($segmen1);
$segmen2 = mysqli_query($koneksi, "SELECT COUNT(*) AS segmen2 FROM data_train WHERE segmen='$segmen' AND ket='Ada'") or die (mysql_error());
$h_segmen2 = mysqli_fetch_array($segmen2);
if ($h_segmen1['segmen1'] == 0 OR $h_segmen2['segmen2'] == 0){
	$sql10 = mysqli_query($koneksi, "SELECT COUNT(*) AS k FROM data_train WHERE segmen='$segmen'") or die (mysql_error());
	$dt10 = mysqli_fetch_array($sql10);
	$h_segmen = ($h_segmen1['segmen1'] + 1) / ($h_tidak['tidak'] + $dt10['k']);
	$h_segmen1 = ($h_segmen2['segmen2'] + 1) / ($h_ada['ada'] + $dt10['k']);
}else{
	$h_segmen = $h_segmen1['segmen1'] / $h_tidak['tidak'];
	$h_segmen1 = $h_segmen2['segmen2'] / $h_ada['ada'];
}

//Pembulu Darah
$pembulu1 = mysqli_query($koneksi, "SELECT COUNT(*) AS pembulu1 FROM data_train WHERE pembulu_darah='$pembulu' AND ket='Tidak Ada'") or die (mysql_error());
$h_pembulu1 = mysqli_fetch_array($pembulu1);
$pembulu2 = mysqli_query($koneksi, "SELECT COUNT(*) AS pembulu2 FROM data_train WHERE pembulu_darah='$pembulu' AND ket='Ada'") or die (mysql_error());
$h_pembulu2 = mysqli_fetch_array($pembulu2);
if ($h_pembulu1['pembulu1'] == 0 OR $h_pembulu2['pembulu2'] == 0){
	$sql11 = mysqli_query($koneksi, "SELECT COUNT(*) AS l FROM data_train WHERE pembulu_darah='$pembulu'") or die (mysql_error());
	$dt11 = mysqli_fetch_array($sql11);
	$h_pembulu = ($h_pembulu1['pembulu1'] + 1) / ($h_tidak['tidak'] + $dt11['l']);
	$h_pembulu1 = ($h_pembulu2['pembulu2'] + 1) / ($h_ada['ada'] + $dt11['l']);
}else{
	$h_pembulu = $h_pembulu1['pembulu1'] / $h_tidak['tidak'];
	$h_pembulu1 = $h_pembulu2['pembulu2'] / $h_ada['ada'];
}

//Thalassemia
$thalas1 = mysqli_query($koneksi, "SELECT COUNT(*) AS thalas1 FROM data_train WHERE thalassemia='$thalas' AND ket='Tidak Ada'") or die (mysql_error());
$h_thalas1 = mysqli_fetch_array($thalas1);
$thalas2 = mysqli_query($koneksi, "SELECT COUNT(*) AS thalas2 FROM data_train WHERE thalassemia='$thalas' AND ket='Ada'") or die (mysql_error());
$h_thalas2 = mysqli_fetch_array($thalas2);
if ($h_thalas1['thalas1'] == 0 OR $h_thalas2['thalas2'] == 0){
	$sql12 = mysqli_query($koneksi, "SELECT COUNT(*) AS m FROM data_train WHERE thalassemia='$thalas'") or die (mysql_error());
	$dt12 = mysqli_fetch_array($sql12);
	$h_thalas = ($h_thalas1['thalas1'] + 1) / ($h_tidak['tidak'] + $dt12['m']);
	$h_thalas1 = ($h_thalas2['thalas2'] + 1) / ($h_ada['ada'] + $dt12['m']);
}else{
	$h_thalas = $h_thalas1['thalas1'] / $h_tidak['tidak'];
	$h_thalas1 = $h_thalas2['thalas2'] / $h_ada['ada'];
}

?>