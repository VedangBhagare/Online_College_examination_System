<?php
$sever="localhost";
$username="root";
$password="";
$dbname="be_proj";

$con= mysqli_connect($sever , $username,$password,$dbname);

if(!$con){
    echo "not connected";
}

$email=$_POST['EID'];
$password=$_POST['PASS'];

$sql ="select * from principal where password='$password' && email='$email'";
$result = $con->query($sql);
$rowcount=mysqli_num_rows($result);
if($rowcount==true){
        //echo "login sucessful";
        header('location:principal_home_page.html');
 }
else{
    echo"error";
 }

 


