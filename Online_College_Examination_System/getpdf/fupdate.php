<?php include('fheader.php'); ?> 
<?php include('dbcon.php');
error_reporting(0);
// $id = $_GET['ID'];
//     $name = $_GET['name'];  // names in [] should be exactly same as names in form i.e <input type="text" name="f_name" class="form-control">
//     $category = $_GET['category'];
//     $dept = $_GET['dept'];
//     $subject = $_GET['subject'];
//     $year = $_GET['year'];
//     $date_from = $_GET['date_from'];
//     $date_to = $_GET['date_to'];
//     $pto = $_GET['p_t_o'];
//     $nostud = $_GET['no_stud'];
//     $total = ($nostud * 5);
 
?> 


<?php   //included for drop
$con = mysqli_connect("localhost","root","","be_proj");
$s = mysqli_query($con,"SELECT * FROM `department`");
?>

<?php   //included for drop
$cont = mysqli_connect("localhost","root","","be_proj");
$t = mysqli_query($cont,"SELECT * FROM `faculty`");
?>


<?php
         $id = $_GET['ID'];
            $query = "SELECT * FROM `billing` where `ID` = '$id'";  // query to select data
            $result = mysqli_query($connection, $query); // holds connection

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                $row = mysqli_fetch_assoc($result);
            }
        

?>



<?php 
        $con= mysqli_connect("localhost" , "root","","be_proj");
        error_reporting(0);

         $id=$_GET['ID'];

     $query ="select * from billing where `ID` = '$id'";
     $query_run=mysqli_Query($connection,$query);
     if(mysqli_num_rows($query_run)>0)
     {
        foreach($query_run as $row)
        {
            //echo $row['sr'];
            ?>
      

<form action="fupdate.php?id_new=<?php echo $id; ?>" method="post"> 

<div class="form-group">
                <label for="name">Name of Examiner</label>
                <br>
                <select name = "name" class="form-control">
                <?php
while($u = mysqli_fetch_array($t))
{
    ?>
            <option
              <?php 
                  if($row['NAME'] ==$u['first_name']) { echo "selected"; }
               ?>
            ><?php echo $u['first_name'];?></option>
            <?php
}
?>
 </select>
            </div>

            <div class="form-group">
                <label for="name">Category</label>
                <br>
                <select name = "category" class="form-control">   
                    <option>Select Category</option> 

                    <option
                    <?php 
                     if($row['CATEGORY'] =='Internal') { echo "selected"; }
                    ?>
                    >Internal</option>

                    <option
                    <?php 
                     if($row['CATEGORY'] =='External') { echo "selected"; }
                    ?>
                    >External</option>
              </select>
          </div>


            <div class="form-group">
                <label for="dept">Department</label>
                <br>
                <select name = "dept" class="form-control">
                <?php
while($r = mysqli_fetch_array($s))
{
    ?>
            <option
              <?php 
                  if($row['DEPARTMENT'] ==$r['department']) { echo "selected"; }
               ?>
            ><?php echo $r['department'];?></option>
            <?php
}
?>
        </select>
            </div>
          
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" value="<?php echo $row['SUBJECT'];?>" class="form-control">
            </div>
          
          
            <div class="form-group">
                <label for="year">Class</label>
                <!-- <input type="text" name="year" class="form-control"> -->
                <select name="year" class="form-control">
                  <option>Select Class</option>

                  <option
                  <?php 
                  if($row['CLASS'] =='FE') { echo "selected"; }
                  ?>
                  >FE</option>

                  <option
                  <?php 
                  if($row['CLASS'] =='SE') { echo "selected"; }
                  ?>
                  >SE</option>

                  <option
                  <?php 
                  if($row['CLASS'] =='TE') { echo "selected"; }
                  ?>
                  >TE</option>

                  <option
                  <?php 
                  if($row['CLASS'] =='BE') { echo "selected"; }
                  ?>
                  >BE</option>

                  <option
                  <?php 
                  if($row['CLASS'] =='MCA') { echo "selected"; }
                  ?>
                  >MCA</option>
                </select>
            </div>


            <div class="form-group">
                <label for="date_from">Date (From)</label>
                <input type="date" name="date_from" class="form-control" value="<?php echo $row['DATE_FROM'];?>">
            </div>

            <div class="form-group">
                <label for="date_to">Date (To)</label>
                <input type="date" name="date_to" class="form-control" value="<?php echo $row['DATE_TO'];?>">
            </div>

            
            <div class="form-group">
                <label for="p_t_o">Practical/Term-work/Oral</label>
                <!-- <input type="text" name="p_t_o" class="form-control"> -->
                <select name="p_t_o" class="form-control">
                    
                  <option>Select</option>

                  <option 
                  <?php 
                  if($row['PR/OR/TW'] =='PR') { echo "selected"; }
                  ?>
                  >PR</option>

                  <option
                  <?php 
                  if($row['PR/OR/TW'] =='TW') { echo "selected"; }
                  ?>
                  >TW</option>

                  <option
                  <?php 
                  if($row['PR/OR/TW'] =='OR'){  echo "selected"; }
                  ?>
                  >OR</option>
                </select>
            </div>


            <div class="form-group">
                <label for="no_stud">No. of Students</label>
                <input type="number" name="no_stud" class="form-control" value="<?php echo $row['NO_OF_STUDENTS'];?>">
            </div>



            <input  type="submit" class="btn btn-success" name="update_faculty" value="UPDATE">
</form>

<?php
        }
    }
    else{
        "no record";
    }
    ?>


<?php include('ffooter.php'); ?> 



<?php

if(isset($_POST['update_faculty'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

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

    $query = "UPDATE `billing` SET `NAME` = '$name', `CATEGORY` = '$category', `DEPARTMENT` = '$dept', `SUBJECT` = '$subject', `CLASS` = '$year',  `DATE_FROM` = '$date_from', `DATE_TO` = '$date_to', `PR/OR/TW` = '$pto', `NO_OF_STUDENTS` = '$nostud', `TOTAL` = '$total'  WHERE `ID` = '$idnew'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:form.php?update_msg=you have successfully updated data');
    }
}

?>
