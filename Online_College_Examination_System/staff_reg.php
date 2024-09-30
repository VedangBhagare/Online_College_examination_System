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

$sql ="insert into staff values ('$name','$email','$password')";

$result=mysqli_Query($con,$sql);

if($result){
    header('location:staff_login.html');
    echo "Registration Successful...";
}
else{
    echo"error";
}
?>