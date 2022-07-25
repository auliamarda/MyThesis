<?php

require('fpdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('fpdf/1.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Prediksi Tunggakan BP3 menggunakan Metode Naïve Bayes',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 03170318262',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Alamat : Indonesia',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Code by : Aulia Mardhatillah',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Hasil Prediksi Tunggakan BP3 menggunakan Metode Naïve Bayes',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'status_ayah', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'pekerjaan_ayah', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'gaji_ayah', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'status_ibu', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'pekerjaan_ibu', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'gaji_ibu', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Hasil Periksa', 1, 0, 'C');
$pdf->ln();

$no=1;
include 'koneksi.php';
$query=mysqli_query($koneksi, "SELECT * FROM hasil_naive");
while($lihat=mysqli_fetch_array($query)){
    $pdf->Cell(1, 0.8, $no , 1, 0, 'C');
    $pdf->Cell(2, 0.8, $lihat['status_ayah'],1, 0, 'C');
    $pdf->Cell(2, 0.8, $lihat['pekerjaan_ayah'],1, 0, 'C');
    $pdf->Cell(2.5, 0.8, $lihat['gaji_ayah'], 1, 0,'C');
    $pdf->Cell(2, 0.8, $lihat['status_ibu'], 1, 0,'C');
    $pdf->Cell(2, 0.8, $lihat['pekerjaan_ibu'], 1, 0,'C');
    $pdf->Cell(2, 0.8, $lihat['gaji_ibu'], 1, 0,'C');
if($lihat['hasil_lunas'] > $lihat['hasil_menunggak']){
    $pdf->Cell(4, 0.8, 'lunas', 1, 0,'C');
}else{
    $pdf->Cell(4, 0.8, 'menunggak', 1, 0,'C');
}
    $pdf->ln();
    $no++;
}
$pdf->Output("laporan_prediksi.pdf","I");
?>
