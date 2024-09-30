<?php include('header.php'); ?> 
<?php include('dbcon.php'); ?> 


<?php   //included for drop
$con = mysqli_connect("localhost","root","","be_proj");
$s = mysqli_query($con,"SELECT * FROM `department`");

?>

<?php   //included for drop
$cont = mysqli_connect("localhost","root","","be_proj");
$t = mysqli_query($cont,"SELECT * FROM `faculty`");

?>


<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    
            $query = "SELECT * FROM `allotment` where `id` = '$id'";  // query to select data
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

if(isset($_POST['update_allotment'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $exam_name = $_POST['exam_name'];  
    $dept = $_POST['dept'];
    $year = $_POST['year'];
    $supervisor = $_POST['supervisor'];
    $total_stud = $_POST['total_stud'];
    $block_allot = $_POST['block'];

    $query = "UPDATE `allotment` SET `exam_name` = '$exam_name', `department` = '$dept', `year` = '$year', `supervisor` = '$supervisor', `total_stud` = '$total_stud', `block` = '$block_allot'  WHERE `id` = '$idnew'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:allot_index.php?update_msg=you have successfully updated data');
    }
}

?>

<form action="allot_update.php?id_new=<?php echo $id; ?>" method="post"> 
<div class="form-group">
                <label for="exam_name">Exam name</label>
                <input type="text" name="exam_name" class="form-control">
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
                <label for="year">Enter Year</label>
                <input type="text" name="year" class="form-control">
            </div>

            <div class="form-group">
                <label for="supervisor">Select Supervisor</label>
                <br>
                <select name = "supervisor" class="form-control">
                <option>Select Name</option>
                <?php
while($u = mysqli_fetch_array($t))
{
    ?>
            <option><?php echo $u['first_name'];?></option>
            <?php
}
?>
 </select>
            </div>

            <div class="form-group">
                <label for="total_stud">Enter Total Number of Students</label>
                <input type="number" name="total_stud" class="form-control">
            </div>

            <input type="submit" class="btn btn-success" name="update_allotment" value="UPDATE">
</form>


<?php include('footer.php'); ?> 