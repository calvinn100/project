<?php
require('../fpdf/fpdf.php');
require('../libs/Functions.php');
$functions = new Functions();
$userid = $_GET['id'];
$userprofile = $functions->getUsersByIdAndStatus($userid);
$userprofile = $userprofile[0];
$userprofilename = $userprofile['name'];
$userprofileemail = $userprofile['email'];
$userprofilephone = $userprofile['phone'];
$userprofileimage = $userprofile['profileimage'];


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Image('../assets/images/company/dp/58b2cfb7ba26c2.00147900.png',10,10,10,10); // image('imagepath','left side padding','top sied padding','image width','image height')
//$pdf->Cell(40,10,'Hello '.$userprofilename);


$pdf->Output();



?>
