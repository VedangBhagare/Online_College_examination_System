<?php include('dbcon.php'); ?> 

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    
            $query = "SELECT * FROM `billing` where `id` = '$id'";  // query to select data
            $result = mysqli_query($connection, $query); // holds connection

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                $row = mysqli_fetch_assoc($result);
            }

    $dept = $_GET['dept'];  // names in [] should be exactly same as names in form i.e <input type="text" name="f_name" class="form-control">
    $name = $_GET['name'];
    $year = $_GET['year'];
    $subject = $_GET['subject'];
    $pract = $_GET['pract'];
    $tw = $_GET['tw'];
    $oral = $_GET['oral'];
    $total = $_GET['total'];

    require("fpdf/fpdf.php");

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont("Arial","",16);  //fpnt type, bold/italics, size
    $pdf->Cell(0,10,"Registration Details",1,1,'C');  //cell is for print,(0 is width, 10 is hieght,"",1 is border,1 is for new line, C is alignment centre)

    
    $pdf->Cell(35,10,"Department",1,0);
    $pdf->Cell(30,10,$dept,1,1);

    $pdf->Cell(30,10,"First Name",1,0);
    $pdf->Cell(30,10,$name,1,1);

    $pdf->Cell(30,10,"Year",1,0);
    $pdf->Cell(30,10,$year,1,1);

    $pdf->Cell(30,10,"Subject",1,0);
    $pdf->Cell(30,10,$subject,1,1);

    $pdf->Cell(30,10,"Practical",1,0);
    $pdf->Cell(30,10,$pract,1,1);

    $pdf->Cell(30,10,"Term-work",1,0);
    $pdf->Cell(30,10,$tw,1,1);

    $pdf->Cell(30,10,"Oral",1,0);
    $pdf->Cell(30,10,$oral,1,1);

    $pdf->Cell(30,10,"Total",1,0);
    $pdf->Cell(30,10,$total,1,1);

    $file = time().'.pdf';
    $pdf->output();
    //$pdf->output($file,'D');
}

?>
        