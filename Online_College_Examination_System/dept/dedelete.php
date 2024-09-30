<?php include('dbcon.php'); ?> 

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$query = "DELETE FROM `department` WHERE `id` = '$id'";
$result = mysqli_query($connection, $query);

if(!$result){
    die("query failed".mysqli_error());
}
else{
    header('location:dindex.php?delete_msg=you have deleted the data');
}

?>