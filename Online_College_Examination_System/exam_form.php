<?php
// if(isset($_POST['name'])&& isset($_POST['mail'])&& isset($_POST['class'])&& isset($_POST['divi'])&& isset($_POST['dept'])&& isset($_POST['prn']))
// {
//     $conn=new mysqli('localhost','root','','be_proj');
//     if($conn->connect_error)
//     {
//         echo"Connection Failed";
//         die;
//     }

//     $name = $_POST['name'];
//     $mail = $_POST['mail'];
//     $class=$_POST['class'];
//     $divi=$_POST['divi'];
//     $dept=$_POST['dept'];
//     $prn=$_POST['prn'];
    
//     if(isset($_FILES['file'])){
//         $filename= $_FILES["file"]["name"];
//         $tempname=$_FILES["file"]["tmp_name"];
//         $folder="upload_pdf/".$filename;
//        $hasFileUploaded=move_uploaded_file($tempname,$folder);  // file upload
// }

// if($hasFileUploaded){
//     $sql ="INSERT INTO exam_form VALUES ('$name','$mail','$class','$divi','$dept','$prn','$folder')";
//     $result=mysqli_Query($conn,$sql);

//     header('location:index.php');
// }
// else{
//     echo "not connected";
// }
// }


//     if (isset($_FILES['file']['name']))
//             {
//                 $file_name = $_FILES['file']['name'];
//                 $file_tmp = $_FILES['file']['tmp_name'];
        
//                 move_uploaded_file($file_tmp,"upload_pdf/".$file_name);
//                 $name = $_POST['name'];
//                 $mail = $_POST['mail'];
//                 $class=$_POST['class'];
//                 $divi=$_POST['divi'];
//                 $dept=$_POST['dept'];
//                 $prn=$_POST['prn'];
//                 $cmd="insert into exam_form(name,email,class,divi,department,prn,file) values('$name','$mail','$class','$divi','$dept','$prn','$file_name')";
//                 $sql_status=mysqli_query($conn,$cmd);

//     if($sql_status)
//     {
        
//         echo "<script> alert('Exam form Submitted Successfully ') </script>";
//         // header('location:index.php');
//         ?>
<!-- //         <META http-equiv="Refresh" content="0; url= http://localhost/Final_year/index.php">  -->
      <?php


//     }
//     //echo $sql_status;
// }
// }
// else
// {
//     echo"Unauthorised Attempt..";
// }
?>

<?php

$server="localhost";
$username="root";
$password="";
$dbname="be_proj";

$con= mysqli_connect($server,$username,$password,$dbname);

if(!$con){
    echo "not connected";
}

$name = $_POST['name'];
$mail = $_POST['mail'];
$class=$_POST['class'];
$divi=$_POST['divi'];
$dept=$_POST['dept'];
$prn=$_POST['prn'];

if(isset($_FILES['file'])){
        $filename= $_FILES["file"]["name"];
        $tempname=$_FILES["file"]["tmp_name"];
        $folder="upload_pdf/".$filename;
       $hasFileUploaded=move_uploaded_file($tempname,$folder);  // file upload
}
if($hasFileUploaded){
     $sql ="INSERT INTO exam_form(name,email,class,divi,department,prn,file) VALUES ('$name','$mail','$class','$divi','$dept','$prn','$folder')";
     $result=mysqli_Query($con,$sql);

     header('location:stud_home_page.html');

}
else{
    echo "not connected";
}


?>