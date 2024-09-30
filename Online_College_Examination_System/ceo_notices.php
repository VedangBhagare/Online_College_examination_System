<?php
// $sever="localhost";
// $username="root";
// $password="";
// $dbname="be_proj";

// $con= mysqli_connect($sever , $username,$password,$dbname);

// if(!$con){
//     echo "not connected";
// }

// $filename= $_FILES["media_img"]["name"];
// $tempname=$_FILES["media_img"]["tmp_name"];
// $folder="images/".$filename;
// move_uploaded_file($tempname,$folder);  // file upload

// $notices=$_POST['news']; 
// $date=$_POST['dt'];
// $sr=$_POST['sr']; // data insertion 

// $sql ="INSERT INTO notices VALUES ('$notices','$date','$sr','$folder')";
// $result=mysqli_Query($con,$sql);



// if($result){
//     //echo "data submited";
//     header('location:coe_notice.php');

// }
// else{
//     echo"error";
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

$notices=$_POST['news']; 
$date=$_POST['dt'];
$sr=$_POST['sr']; // data insertion 


if(isset($_FILES['media_img'])){
        $filename= $_FILES["media_img"]["name"];
        $tempname=$_FILES["media_img"]["tmp_name"];
        $folder="images/".$filename;
       $hasFileUploaded=move_uploaded_file($tempname,$folder);  // file upload
}
if($hasFileUploaded){
     $sql ="INSERT INTO notices VALUES ('$notices','$date','$sr','$folder')";
     $result=mysqli_Query($con,$sql);

     header('location:coe_notice.php');

}
else{
    echo "not connected";
}


?>