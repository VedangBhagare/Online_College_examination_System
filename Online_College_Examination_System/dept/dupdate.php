 <?php include('dheader.php'); ?> 
<?php include('dbcon.php'); ?> 


<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    
            $query = "SELECT * FROM `department` where `id` = '$id'";  // query to select data
            $result = mysqli_query($connection, $query); // holds connection

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                $row = mysqli_fetch_assoc($result);
            }
        }

?>


<form action="dupdate.php?id_new=<?php echo $id; ?>" method="post"> 


            <div class="form-group">
                <label for="dept">Department</label>
                <input type="text" name="dept" class="form-control" value="<?php echo $row['department']; ?>">
            </div>


            <input type="submit" class="btn btn-success" name="update_faculty" value="UPDATE">
</form>

<!-- //Update Query -->

<?php

if(isset($_POST['update_faculty'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $dept = $_POST['dept'];

    $query = "UPDATE `department` SET `department` = '$dept'  WHERE `id` = '$idnew'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:dindex.php?update_msg=you have successfully updated data');
    }
}

?>

<?php include('dfooter.php'); ?> 