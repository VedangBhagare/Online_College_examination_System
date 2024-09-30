 <?php

// $sever="localhost";
// $username="root";
// $password="";
// $dbname="be_proj";

// $con= mysqli_connect($sever , $username,$password,$dbname); 

// $sr=$_GET['sr'];
// $sql="DELETE FROM notices WHERE sr='$sr'";
// $result=mysqli_Query($con,$sql);


// if($result){
//    // echo"deleted";
//      header('location:coe_notice.php');
//  }
// else{
//     echo"not deleted";
// }

// ?>    
<?php

$sever="localhost";
$username="root";
$password="";
$dbname="be_proj";

$con= mysqli_connect($sever , $username,$password,$dbname); 
$sr=$_GET['sr'];

$query = mysqli_Query($con,"SELECT media_img FROM notices WHERE sr='$sr'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
$currentimage=$row['media_img'];

$affected= mysqli_Query($con,"DELETE FROM notices WHERE sr='$sr'")or die(mysqli_error());

if($affected){
        unlink("images/".$currentimage);
        header('location:coe_notice.php');
    }

?>










