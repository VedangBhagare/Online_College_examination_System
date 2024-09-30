<?php

if(!empty($_POST['print']))
{
    $dept = $_POST['dept'];
    $f_name = $_POST['name'];
    $year = $_POST['year'];
    $subject = $_POST['subject'];
    $pract = $_POST['pract'];
    $term = $_POST['tw'];
    $oral = $_POST['oral'];

    $total = 220+($pract*10 + $term*10 + $oral*10);

    require("fpdf/fpdf.php");

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont("Arial","",16);  //fpnt type, bold/italics, size
    $pdf->Cell(0,10,"Registration Details",1,1,'C');  //cell is for print,(0 is width, 10 is hieght,"",1 is border,1 is for new line, C is alignment centre)

    
    $pdf->Cell(35,10,"Department",1,0);
    $pdf->Cell(30,10,$dept,1,1);

    $pdf->Cell(30,10,"First Name",1,0);
    $pdf->Cell(30,10,$f_name,1,1);

    $pdf->Cell(30,10,"Year",1,0);
    $pdf->Cell(30,10,$year,1,1);

    $pdf->Cell(30,10,"Subject",1,0);
    $pdf->Cell(30,10,$subject,1,1);

    $pdf->Cell(30,10,"Practical",1,0);
    $pdf->Cell(30,10,$pract,1,1);

    $pdf->Cell(30,10,"Term-work",1,0);
    $pdf->Cell(30,10,$term,1,1);

    $pdf->Cell(30,10,"Oral",1,0);
    $pdf->Cell(30,10,$oral,1,1);

    $pdf->Cell(30,10,"Total",1,0);
    $pdf->Cell(30,10,$total,1,1);

    $file = time().'.pdf';
    $pdf->output();
    $pdf->output($file,'D');
}

?>