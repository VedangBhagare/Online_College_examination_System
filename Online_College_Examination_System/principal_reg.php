<?php
$sever="localhost";
$username="root";
$password="";
$dbname="be_proj";

$con= mysqli_connect($sever , $username,$password,$dbname);

if(!$con){
    echo "not connected";
}


$name=$_POST["NAME"];
$email=$_POST["EID"];
$password=$_POST["PASS"];

$sql ="insert into principal values ('$name','$email','$password')";

$result=mysqli_Query($con,$sql);

if($result){
    echo "<script> alert('Registration Successfully.. ') </script>";
    ?>
        <META http-equiv="Refresh" content="0; url= http://localhost/Final_year/principal_login.html"> 
       <?php
}
else{
    echo"error";
}
?>