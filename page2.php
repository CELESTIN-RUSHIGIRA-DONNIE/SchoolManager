<?php
// include("assets/phpqrcode/qrlib.php");
// QRcode::png($_GET['code']);
include("assets/fpdf/fpdf.php");

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','',12);


$pdf->Cell(20,10,'ID',1,0);
$pdf->Cell(50,10,'NAME',1,0);
$pdf->Cell(100,5,'SCORE',1,0);
$pdf->Cell(20,10,'PASSING',1,0);
$pdf->Cell(0,5,'',0,1); 

$pdf->Cell(70,5,'',0,0);
$pdf->Cell(25,5,'Q1',1,0);
$pdf->Cell(25,5,'Q2',1,0);
$pdf->Cell(25,5,'Q3',1,0);
$pdf->Cell(25,5,'Q4',1,0);

$pdf->setFont('Arial','',11);
for($i=1;$i<=20;$i++){
    $pdf->Cell(20, 5,$i,'LR',0,'R');
    $pdf->Cell(50, 5,'Student '.$i, 'LR',0);
    $pdf->Cell(25, 5, rand(70,100), 'LR',0);
    $pdf->Cell(25, 5, rand(70,100), 'LR',0);
    $pdf->Cell(25, 5, rand(70,100), 'LR',0);
    $pdf->Cell(25, 5, rand(70,100), 'LR',0);
    $pdf->Cell(25, 5, 'Passed', 'LR',1);

}
    $pdf->Cell(190,5,'','T',1);

$pdf->Output();

?>