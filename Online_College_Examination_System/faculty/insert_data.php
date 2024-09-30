<?php
include 'dbcon.php';

if(isset($_POST['add_faculty'])){
    
    $fname = $_POST['f_name'];  // names in [] should be exactly same as names in form i.e <input type="text" name="f_name" class="form-control">
    $dept = $_POST['dept'];
    $email = $_POST['e_mail'];
    $contno = $_POST['co_no'];

    if($fname == "" || empty($fname)){
        header('location:faculty_index.php?message=fill the first name !'); //form validation
    }

    else{
        $query = "INSERT INTO `faculty` (`first_name`, `department`, `email`, `c_no`) VALUES ('$fname', '$dept', '$email', '$contno')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            header('location:faculty_index.php?insert_msg=your data has been added successfully'); //to redirect user 
        }
    }
}
?>
