<?php include('dbcon.php'); ?> 

<?php

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
}
$query = "DELETE FROM `billing` WHERE `ID` = '$id'";
$result = mysqli_query($connection, $query);

if(!$result){
    die("query failed".mysqli_error());
}
else{
    header('location:form.php?delete_msg=you have deleted the data');
}

?>