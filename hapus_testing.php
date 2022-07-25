<?php 
include 'koneksi.php';
$id = $_GET['id'];
$del1 = mysqli_query($koneksi, "DELETE FROM data_testing WHERE no_testing='$id'")or die(mysql_error());
if(mysqli_query){
header("location:datatesting.php?pesan=hapus");
}
?>