<?php include('dbcon.php'); ?> 

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$query = "DELETE FROM `faculty` WHERE `id` = '$id'";
$result = mysqli_query($connection, $query);

if(!$result){
    die("query failed".mysqli_error());
}
else{
    header('location:faculty_index.php?delete_msg=you have deleted the data');
}

?>