<?php
require('fpdf/fpdf.php');
include('config.php');
$id = $_GET['id'];

$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Fecha: '.date('d-m-Y').'',0,"R");
$pdf->Ln(14);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(100,10,'Perfil de Usuario',1,0);

$query="SELECT * FROM users WHERE username='$id'";
$result = mysqli_query($mysqli, $query);
$no=0;
while($row = mysqli_fetch_array($result)){
	$no=$no+1;
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(50,8,'No.',1,0);
	$pdf->Cell(50,8,$no,1,1);
	
	$pdf->Cell(50,8,'Nombre',1,0);
	$pdf->Cell(50,8,$row['firstname'],1,1);
	
	$pdf->Cell(50,8,'Apellido',1,0);
	$pdf->Cell(50,8,$row['middlename'],1,1);
	
	$pdf->Cell(50,8,'Segundo Apellido',1,0);
	$pdf->Cell(50,8,$row['lastname'],1,1);
	
	$pdf->Cell(50,8,'Fecha Nacimiento',1,0);
	$pdf->Cell(50,8,$row['birthdate'],1,1);
	
	$pdf->Cell(50,8,'Usuario',1,0);
	$pdf->Cell(50,8,$row['username'],1,1);
	
	$pdf->Cell(50,8,'Clave',1,0);
	$pdf->Cell(50,8,$row['password'],1,1);
}

$pdf->Output();
?>