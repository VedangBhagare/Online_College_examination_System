<?php
$host = "localhost:3307";
$user = "root";
$pass = "";
$dbname = "be_proj";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if(!$conn){
   die("Connection failed : ".mysqli_connect_error());
}


$status = $_POST['status'];
$insert = "INSERT INTO `applications`(`status`) VALUES ('$status')";
$result = mysqli_query($conn,$insert);

$conn->close();
?>