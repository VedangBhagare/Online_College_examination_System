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
$prn=$_POST["PRN"];
$password=$_POST["password"];

$sql ="insert into student values ('$name','$email','$prn','$password')";

$result=mysqli_Query($con,$sql);

if($result){
    header('location:student_login.html');
    echo "Registration Successful...";
}
else{
    echo"error";
}
?>