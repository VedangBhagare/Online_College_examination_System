<?php
$conn=new mysqli('localhost','root','','be_proj');
if($conn->connect_error)
{
    echo"Connection Error...";
    die;
}
?>