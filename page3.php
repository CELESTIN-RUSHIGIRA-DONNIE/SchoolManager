<?php
include("assets/fpdf/fpdf.php");

$pdf= new FPDF('p','mm','A4');
$pdf->AddPage();
$pdf->Image("http://localhost/school/page2.php?code=contenthere",10,10,30,30,"png");

$pdf->Output();

?>