<?php include('dbcon.php'); ?> 
<?php include('export_data.php'); ?>
<?php include('fheader.php'); ?> 


<?php   //included for drop
$con = mysqli_connect("localhost","root","","be_proj");
$s = mysqli_query($con,"SELECT * FROM `department`");

?>

<?php   //included for drop
$cont = mysqli_connect("localhost","root","","be_proj");
$t = mysqli_query($cont,"SELECT * FROM `faculty`");

?>


<div class="box1">
<h2>RECORDS</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD RECORD</button>
</div>

    <table class="table table-hover tablefa-bordered table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Department</th>
                <th>Subject</th>
                <th>Class</th>
                <th>Date (FROM)</th>
                <th>Date (TO)</th>
                <th>PR/TW/OR</th>
                <th>No. of Students</th>
                <th>Total</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `billing`";  // query to select data
            $result = mysqli_query($connection, $query); // holds connection

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                    ?>

            <tr>
                <td><?php echo $row['ID'];?></td>
                <td><?php echo $row['NAME'];?></td>
                <td><?php echo $row['CATEGORY'];?></td>
                <td><?php echo $row['DEPARTMENT'];?></td>
                <td><?php echo $row['SUBJECT'];?></td>
                <td><?php echo $row['CLASS'];?></td>
                <td><?php echo $row['DATE_FROM'];?></td>
                <td><?php echo $row['DATE_TO'];?></td>
                <td><?php echo $row['PR/OR/TW'];?></td>
                <td><?php echo $row['NO_OF_STUDENTS'];?></td>
                <td><?php echo $row['TOTAL'];?></td>
                <td><a href="fupdate.php?ID=<?php echo $row['ID'];?>" class="btn btn-success">Update</a></td>
                <td><a href="fdelete.php?ID=<?php echo $row['ID'];?>" class="btn btn-danger">Delete</a></td>
                
            </tr>
                    
                    <?php 
                }
            }
          
            ?>

            
        </tbody>
    </table>  <!-- tables's body -->

    <?php
    if(isset($_GET['message'])){
      echo "<h6>".$_GET['message']."</h6>";  //form validation from insert_data.php
    }
    ?>

    <?php
    if(isset($_GET['insert_msg'])){
      echo "<h6>".$_GET['insert_msg']."</h6>";  //form validation from insert_data.php
    }
    ?>

    <?php
    if(isset($_GET['update_msg'])){
      echo "<h6>".$_GET['update_msg']."</h6>";  //form validation from insert_data.php
    }
    ?>

<?php
    if(isset($_GET['delete_msg'])){
      echo "<h6>".$_GET['delete_msg']."</h6>";  //form validation from insert_data.php
    }
    ?>

    <!-- Modal -->
    <form action="/DEFAULT_URL" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="form-group">
                <label for="name">Name of Examiner</label>
                <br>
                <select name = "name" class="form-control">
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
                <label for="name">Category</label>
                <br>
                <select name = "category" class="form-control">   
                    <option>Select Category</option>           
                    <option>Internal</option>
                    <option>External</option>
              </select>
          </div>
            <!-- <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control">   
            </div> -->
        
        
      <div class="form-group">
                <label for="dept">Department</label>
                <br>
                <select name = "dept" class="form-control">
                <option>Select Department</option>
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
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control">
            </div>
          
          
            <div class="form-group">
                <label for="year">Class</label>
                <!-- <input type="text" name="year" class="form-control"> -->
                <select name="year" class="form-control">
                  <option>Select Class</option>
                  <option>FE</option>
                  <option>SE</option>
                  <option>TE</option>
                  <option>BE</option>
                  <option>ME</option>
                  <option>MCA</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date_from">Date (From)</label>
                <input type="date" name="date_from" class="form-control">
            </div>

            <div class="form-group">
                <label for="date_to">Date (To)</label>
                <input type="date" name="date_to" class="form-control">
            </div>


            <div class="form-group">
                <label for="p_t_o">Practical/Term-work/Oral</label>
                <!-- <input type="text" name="p_t_o" class="form-control"> -->
                <select name="p_t_o" class="form-control">
                  <option>Select</option>
                  <option>PR</option>
                  <option>TW</option>
                  <option>OR</option>
                </select>
            </div>

            <!-- <div class="form-group">
                <label for="date_to">Practical</label>
                <input type="text" name="p_t_o" class="form-control">
            </div> -->

            


            <div class="form-group">
                <label for="no_stud">No. of Students</label>
                <input type="number" name="no_stud" class="form-control">
            </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input formaction="bil_insert.php" type="submit" class="btn btn-success" name="add_faculty" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
</form>

<?php include('ffooter.php'); ?> 

    



<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="pdf.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Faculty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department" class="form-control">
            </div>
        

            <div class="form-group">
                <label for="firstname">First name</label>
                <input type="text" name="firstname" class="form-control">
            </div>


            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" class="form-control">
            </div>

            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" name="year" class="form-control">
            </div>

            <div class="form-group">
                <label for="exam">subject</label>
                <input type="text" name="subject" class="form-control">
            </div>

            <div class="form-group">
                <label for="pract">Practicals conducted</label>
                <input type="number" name="pract" class="form-control">
            </div>

            <div class="form-group">
                <label for="term">Term work</label>
                <input type="number" name="term" class="form-control">
            </div>

            <div class="form-group">
                <label for="oral">Oral conducted</label>
                <input type="number" name="oral" class="form-control">
            </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="submit" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>


</body>
</html>