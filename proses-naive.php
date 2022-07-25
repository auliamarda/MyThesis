<?php
include 'koneksi.php';

//  var_dump($_POST); die;
$status_ayah=$_POST['status_ayah'];
 $pekerjaan_ayah=$_POST['pekerjaan_ayah'];
 $gaji_ayah=$_POST['gaji_ayah'];
 $status_ibu=$_POST['status_ibu'];
 $pekerjaan_ibu=$_POST['pekerjaan_ibu'];
 $gaji_ibu=$_POST['gaji_ibu'];

//naive_bayes

$total_lunas = $koneksi->query("SELECT * FROM data_train WHERE label='lunas'")->num_rows;
$total_menunggak = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak'")->num_rows;
$totalData = $koneksi->query("SELECT * FROM data_train")->num_rows;

  // status ayah

      //lunas

  $total_sal = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and status_ayah = '$status_ayah'")->num_rows;

      //menunggak

  $total_sam = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and status_ayah = '$status_ayah'")->num_rows;

    
  
  // pekerjaan ayah
  
  //lunas

  $total_pal = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and pekerjaan_ayah = '$pekerjaan_ayah'")->num_rows;

  //menunggak

$total_pam = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and pekerjaan_ayah = '$pekerjaan_ayah'")->num_rows;




// gaji ayah
  
  //lunas

  $total_gal = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and gaji_ayah = '$gaji_ayah'")->num_rows;

  //menunggak

$total_gam = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and gaji_ayah = '$gaji_ayah'")->num_rows;





  // status ibu

      //lunas

      $total_sil = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and status_ibu = '$status_ibu'")->num_rows;

      //menunggak

  $total_sim = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and status_ibu = '$status_ibu'")->num_rows;

    

  // pekerjaan ibu
  
  //lunas

  $total_pil = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and pekerjaan_ibu = '$pekerjaan_ibu'")->num_rows;

  //menunggak

$total_pim = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and pekerjaan_ibu = '$pekerjaan_ibu'")->num_rows;





  // gaji ibu
  
  //lunas

  $total_gil = $koneksi->query("SELECT * FROM data_train WHERE label ='lunas' and gaji_ibu = '$gaji_ibu'")->num_rows;

  //menunggak

$total_gim = $koneksi->query("SELECT * FROM data_train WHERE label='menunggak' and gaji_ibu = '$gaji_ibu'")->num_rows;




//PROBABILITY + laplace

//status ayah

$PROB_sal  = (($total_sal  + 1) /($total_lunas  + 2));
$PROB_sam  = (($total_sam  + 1) /($total_menunggak  + 2));

//pekerjaan ayah

$PROB_pal  = (($total_pal  + 1)/($total_lunas  +37));
$PROB_pam = (($total_pam  + 1) /($total_menunggak  + 37));

//gaji ayah

$PROB_gal  = (($total_gal  + 1)/($total_lunas  +6));
$PROB_gam  = (($total_gam  + 1) /($total_menunggak  + 6));

//status ibu

$PROB_sil  = (($total_sil  + 1)/($total_lunas  +2));
$PROB_sim  = (($total_sim  + 1) /($total_menunggak  + 2));

//pekerjaan ibu

$PROB_pil  = (($total_pil  + 1)/($total_lunas  +22));
$PROB_pim  = (($total_pim  + 1) /($total_menunggak  + 22));

//gaji ibu

$PROB_gil  = (($total_gil  + 1)/($total_lunas +6));
$PROB_gim  = (($total_gim  + 1) /($total_menunggak + 6));



//prediksi

$lunas1 = $PROB_sal * $PROB_pal* $PROB_gal  * $PROB_sil  * $PROB_pil   * $PROB_gil;

$lunas = number_format((float) $lunas1 * ($total_lunas/$totalData), 5, '.', '');


$menunggak1 = $PROB_sam   *$PROB_pam  * $PROB_gam  * $PROB_sim  * $PROB_pim   * $PROB_gim; 

$menunggak = number_format((float) $menunggak1 * ($total_menunggak/$totalData), 5, '.', '');


if($lunas >= $menunggak){
  $labelp = "lunas";
  }
  else{
  $labelp = "menunggak";
  }
 
$sql = "'$status_ayah','$pekerjaan_ayah','$gaji_ayah','$status_ibu','$pekerjaan_ibu','$gaji_ibu','$labelp','$menunggak','$lunas'";
// var_dump($sql);die;
 //INSERT
     $query=mysqli_query($koneksi, "INSERT INTO hasil_naive (status_ayah, pekerjaan_ayah, gaji_ayah, status_ibu, pekerjaan_ibu, gaji_ibu,label, hasil_menunggak, hasil_lunas) VALUES ($sql)") or die(mysqli_error($koneksi));
    
      if($query):
         echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
         echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
       else:
         echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
         echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
       endif;   
header("location:tampil-naive.php");
?>