<?php
include("assets/fpdf/fpdf.php");


//A4 width: 219mm
//default margin: 10mm each side
//writable horizontal: 219-(10*2)=189mm

/*   EXERCICE SERIE 1
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(55, 5, 'References Code', 1,0);
$pdf->Cell(58, 5, ': 002930', 1,0);
$pdf->Cell(25, 5, 'Date', 1,0);
$pdf->Cell(52, 5, ': 22-Feb-2024', 1,0);
$pdf->Output();  */

class PDF extends FPDF{
    function Header(){
        $this->setFont('Arial','B',15);
        $this->Cell(12);
        $this->Image('IMG.jpg',10,10,10);


        $this->Cell(100,10,'Student List',0,1);

        $this->Ln(10);
    }
    function Footer(){
        $this->SetY(-15);
        $this->setFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo()."/ {p ages}",0,0,'C');
    }
}

$pdf = new PDF('p','mm','A4');

$pdf->AliasNbPages('{pages}');
$pdf->AddPage();  

//$pdf->Image('IMG.jpg',10,10,189);


//set font to arial bold 14pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(20,10, 'ID',1,0);//VERTICAL MERGED CELL
$pdf->Cell(50, 10, 'NAME',1,0);
$pdf->Cell(100, 5, 'SCORE',1,0);
$pdf->Cell(20, 10, 'PASSING',1,0);
$pdf->Cell(0,5,'',0,1);

$pdf->Cell(70,5,'',0,0);
$pdf->Cell(25, 5, 'KKKK',1,0);
$pdf->Cell(25, 5, 'KKKK',1,0);
$pdf->Cell(25, 5, 'KKKK',1,0);
$pdf->Cell(25, 5, 'KKKK',1,0);

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


    $pdf->AddPage();
    $pdf->AddPage();
    $pdf->AddPage(); 

$pdf->Output();
?>