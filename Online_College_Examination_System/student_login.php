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
$prn=$_POST['PRN'];
$password=$_POST['password'];

$sql ="select * from student where prn='$prn' && email='$email' && password='$password'";
$result = $con->query($sql);
$rowcount=mysqli_num_rows($result);
if($rowcount==true){
        // echo "login sucessful";
        header('location:stud_home_page.html');
 }
else{
    echo"error";
 }

 


