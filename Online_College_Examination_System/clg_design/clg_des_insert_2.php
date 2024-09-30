<?php include 'dbcon.php';

if(isset($_POST['add_block'])){
    
    $floor = $_POST['floor'];  // names in [] should be exactly same as names in form i.e <input type="text" name="f_name" class="form-control">
    $bno = $_POST['bno'];
    $capacity = $_POST['capacity'];
    
    if($bno == "" || empty($bno)){
        header('location:clg_des_index.php?message=fill the first name !'); //form validation
    }

    else{
        $query = "INSERT INTO `block` (`floor`, `bno`, `capacity`) VALUES ('$floor', '$bno', '$capacity')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            header('location:clg_des_index.php?insert_msg=your data has been added successfully'); //to redirect user 
        }
    }
}
?>
