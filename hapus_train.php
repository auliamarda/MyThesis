<?php 
include 'koneksi.php';
$id = $_GET['id'];
$del1 = mysqli_query($koneksi, "DELETE FROM data_train WHERE no_train='$id'")or die(mysql_error());
if(mysqli_query){
header("location:dataset.php?pesan=hapus");
}
?>