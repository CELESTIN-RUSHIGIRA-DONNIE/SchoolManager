<?php
include("assets/fpdf/fpdf.php");
include("config/dbcon.php");

class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',15);
       
        $this->Cell(12);

        $this->Image('qrtest.png',10,10,10);

        $this->Cell(100,10,'Student List',0,1);

        $this->Ln(5);
        $this->SetFont('Arial','B',11);
        $this->SetFillColor(180,180,250);
        $this->SetDrawColor(50,50,100);
        $this->Cell(40, 5, 'ID',1,0,'',true);
        $this->Cell(25, 5, 'NAME',1,0,'',true);
        $this->Cell(65, 5, 'PROMOTION', 1,0,'',true);
        $this->Cell(60, 5, 'DEPARTMENT', 1,0,'',true);

    }
    function Footer(){
        
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo()."/ {pages}",0,0,'C');
    }
}

$pdf = new PDF('p','mm','A4');

$pdf->AliasNbPages('{pages}');

$pdf->AddPage();  

$pdf->setFont('Arial','',9);
$pdf->SetDrawColor(50,50,100);

$query =mysqli_query($con, "SELECT * FROM listStudents");                   
while($data=mysqli_fetch_array($query))
{
    $pdf->Cell(40,5,$data['id'],1,0);
    $pdf->Cell(25,5,$data['fname'],1,0);
    $pdf->Cell(65,5,$data['promotion_name'],1,0);
    $pdf->Cell(60,5,$data['department_name'],1,1);
}








$pdf->Output();
?>