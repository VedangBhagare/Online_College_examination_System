<?php
include 'dbcon.php';

if(isset($_POST['add'])){
    
    $name = $_POST['name'];  // names in [] should be exactly same as names in form i.e <input type="text" name="f_name" class="form-control">
    $category = $_POST['category'];
    $dept = $_POST['dept'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $pto = $_POST['p_t_o'];
    $nostud = $_POST['no_stud'];
    $total = ($nostud * 5);


    if($name == "" || empty($name)){
        header('location:staff_billing.php?message=fill the first name !'); //form validation
    }

    else{
        $query = "INSERT INTO `billing` (`NAME`, `CATEGORY`, `DEPARTMENT`, `SUBJECT`, `CLASS`, `DATE_FROM`, `DATE_TO`, `PR/OR/TW`, `NO_OF_STUDENTS`, `TOTAL`) VALUES ('$name', '$category', '$dept', '$subject', '$year', '$date_from', '$date_to', '$pto', '$nostud', '$total')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            header('location:staff_billing.php?insert_msg=your data has been added successfully'); //to redirect user 
        }
    }
}
?>