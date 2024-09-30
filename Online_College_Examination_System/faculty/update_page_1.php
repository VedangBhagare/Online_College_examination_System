<?php include('header.php'); ?> 
<?php include('dbcon.php'); ?> 


<?php   //included for drop
$con = mysqli_connect("localhost","root","","be_proj");
$s = mysqli_query($con,"SELECT * FROM `department`");

?>


<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    
            $query = "SELECT * FROM `faculty` where `id` = '$id'";  // query to select data
            $result = mysqli_query($connection, $query); // holds connection

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                $row = mysqli_fetch_assoc($result);
            }
        }

?>

<?php

if(isset($_POST['update_faculty'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $fname = $_POST['f_name'];
    $dept = $_POST['dept'];
    $email = $_POST['e_mail'];
    $contno = $_POST['co_no'];

    $query = "UPDATE `faculty` SET `first_name` = '$fname', `department` = '$dept', `email` = '$email', `c_no` = '$contno'  WHERE `id` = '$idnew'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:faculty_index.php?update_msg=you have successfully updated data');
    }
}

?>

<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post"> 
<div class="form-group">
                <label for="f_name">Enter name</label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']?>">
            </div>


            <div class="form-group">
                <label for="dept">Department</label>
                <br>
                <select name = "dept" class="form-control">
                <?php
while($r = mysqli_fetch_array($s))
{
    ?>
            <option><?php echo $r['department'];?></option>
            <?php
}
?>
         </select>
            </div>  


            <div class="form-group">
                <label for="e_mail">Email ID</label>
                <input type="text" name="e_mail" class="form-control" value="<?php echo $row['email']?>">
            </div>

            <div class="form-group">
                <label for="co_no">Contact No.</label>
                <input type="text" name="co_no" class="form-control" value="<?php echo $row['c_no']?>">
            </div>

            <input type="submit" class="btn btn-success" name="update_faculty" value="UPDATE">
</form>


<?php include('footer.php'); ?> 