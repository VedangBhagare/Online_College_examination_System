<?php
include 'dbcon.php';

if(isset($_POST['add_faculty'])){
    
    $dept = $_POST['dept'];

    if($dept == "" || empty($dept)){
        header('location:dindex.php?message=fill the department name !'); //form validation
    }

    else{
        $query = "INSERT INTO `department` (`department`) VALUES ('$dept')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            header('location:dindex.php?insert_msg=your data has been added successfully'); //to redirect user 
        }
    }
}
?>
