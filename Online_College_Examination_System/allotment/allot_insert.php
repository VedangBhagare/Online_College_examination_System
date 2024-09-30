<?php include 'dbcon.php';

if(isset($_POST['add_allot'])){
    
    $exam_name = $_POST['exam_name'];  // names in [] should be exactly same as names in form i.e <input type="text" name="f_name" class="form-control">
    $dept = $_POST['dept'];
    $year = $_POST['year'];
    $supervisor = $_POST['supervisor'];
    $total_stud = $_POST['total_stud'];
    $block_allot = $_POST['block'];
    
    if($exam_name == "" || empty($exam_name)){
        header('location:allot_index.php?message=fill the exam name !'); //form validation
    }

    else{
        $query = "INSERT INTO `allotment` (`exam_name`, `department`, `year`, `supervisor`, `total_stud`, `block`) VALUES ('$exam_name', '$dept', '$year', '$supervisor', '$total_stud', '$block_allot')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            header('location:allot_index.php?insert_msg=your data has been added successfully'); //to redirect user 
        }
    }
}
?>
