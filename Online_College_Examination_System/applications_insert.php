


<?php
  
 $host = "localhost";
 $user = "root";
 $pass = "";
 $dbname = "be_proj";
 
 $conn = mysqli_connect($host, $user, $pass, $dbname);
 
if(!$conn){
    die("Connection failed : ".mysqli_connect_error());
}
//else{
// echo " Connection was successfull ";
//}
 
 
 //$prn = $_POST['prn'];
 //$fullname = $_POST['fullname'];
 //$email = $_POST['email'];
 //$contact = $_POST['contact'];
 //$department = $_POST['department'];
 //$years = $_POST['years'];
 //$application_type = $_POST['application_type'];


// Specify the target folders for each file
//$transcriptsupload = 'Transcripts/';
//$wordupload = 'Word_Files/';

// Check if the form was submitted and files were uploaded
    
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['Transcripts']) && !empty($_FILES['Word']) && !empty($_POST['prn'])&& !empty($_POST['fullname'])&& !empty($_POST['email'])&& !empty($_POST['contact'])&& !empty($_POST['department'])&& !empty($_POST['years'])&& !empty($_POST['application_type'])) {
    $prn = $_POST['prn'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $department = $_POST['department'];
    $years = $_POST['years'];
    $application_type = $_POST['application_type'];

    $Transcripts = $_FILES['Transcripts']['name'];
    $Word = $_FILES['Word']['name'];

  // Move the first file to folder1
 // $target1 = 'Transcripts/'.basename($Transcripts['name']);
  //move_uploaded_file($Transcripts['tmp_name'], $target1);

  // Move the second file to folder2
  //$target2 = '$Word_Files/'.basename($Word['name']);
  //move_uploaded_file($Word['tmp_name'], $target2);

  //echo 'Files uploaded successfully.';
}



 //$Transcripts = $_FILES['Transcripts']['name'];
 //$tmp_name = $_FILES['Transcripts']['tmp_name'];
 //$uploadTranscripts = 'Transcripts/'.$Transcripts;

 //$Word = $_FILES['Word']['name'];
 //$tmp_name = $_FILES['Word']['tmp_name'];
 //$uploadWordFiles = 'Word_Files/'.$Word;

// $insert = "CREATE TABLE `Students`(`fullname` VARCHAR(25) NOT NULL , `prn` VARCHAR(10) NOT NULL ,`email` VARCHAR(25) NOT NULL,`contact` BIGINT(12) NOT NULL,`department` VARCHAR(10) NOT NULL,`years` VARCHAR(2) NOT NULL,`application_type` VARCHAR(10) NOT NULL)";
//$result = mysqli_query($conn,$insert);
// if($result){
//    echo " Table created successfully ";
// }
// else{
//    echo " Table was not created successfully ".mysqli_error($conn);
// }

 $insert = "INSERT INTO `applications`(`prn`,`fullname`,`email`,`contact`,`department`,`years`,`application_type`,`transcripts`,`word`) VALUES ('$prn','$fullname','$email','$contact','$department','$years','$application_type','$Transcripts','$Word')";
 $result = mysqli_query($conn,$insert);

 if($result){
  $tname1 = $_FILES['Transcripts']['tmp_name'];
  $uploadTranscripts = 'Transcripts/'.$Transcripts;

 
  $tname2 = $_FILES['Word']['tmp_name'];
  $uploadWordFiles = 'Word_Files/'.$Word;
   
 
   /// $transcriptsupload = 'Transcripts/';
    //$wordupload = 'Word_Files/';
    //$target1 = $transcriptsupload.basename($Transcripts['name']);
    //move_uploaded_file($Transcripts['tmp_name'], $target1);
    //$target2 = $wordupload.basename($Word['name']);
    //move_uploaded_file($Word['tmp_name'], $target2);
   move_uploaded_file($tname1,$uploadTranscripts);
   move_uploaded_file($tname2,$uploadWordFiles);
  
    
    echo "<script> alert('Application Submitted Successfully.. ') </script>";
    ?>
        <META http-equiv="Refresh" content="0; url= http://localhost/Final_year/stud_home_page.html"> 
       <?php

    
 }
else{
 echo "Form was not submitted successfully".mysqli_error($conn);
}

?>
 
