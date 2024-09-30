<?php error_reporting(E_ALL^E_NOTICE);
      error_reporting(0);      
?>
<?php include('header.php'); ?> 
<?php include('dbcon.php'); ?> 
<?php include('../connection.php'); ?> 

<?php   //included for drop
$con = mysqli_connect("localhost","root","","be_proj");
$s = mysqli_query($con,"SELECT * FROM `department`");

?>

<?php   //included for drop
$cont = mysqli_connect("localhost","root","","be_proj");
$t = mysqli_query($cont,"SELECT * FROM `faculty`");

?>

<?php
// Retrieve data from the database
$query = "SELECT * FROM `department`";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="box1">
<h2>Exam Allotment</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD EXAM</button>
</div>

    <table class="table table-hover tablefa-bordered table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Exam name</th>
                <th>Department</th>
                <th>Year</th>
                <th>Supervisor</th>
                <th>Total Students</th>
                <th>Block</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `allotment`";  // query to select data
            $result = mysqli_query($connection, $query); // holds connection

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                    ?>

            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['exam_name'];?></td>
                <td><?php echo $row['department'];?></td>
                <td><?php echo $row['year'];?></td>
                <td><?php echo $row['supervisor'];?></td>
                <td><?php echo $row['total_stud'];?></td>
                <td><?php echo "Block No. ".$row['block'];?></td>
                <td><a href="allot_update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
                <td><a href="allot_delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>

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
    <form action="allot_insert.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
            <div class="form-group">
                <label for="exam_name">Exam name</label>
                <input type="text" name="exam_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="dept">Department</label>
                <br>
                <select class="form-control" name="dept" onchange="disableSelectedOption(this.value)">
                <option>Select Department</option>
  <?php foreach ($data as $item): ?>
    <option value="<?php echo $item['department']; ?>"><?php echo $item['department']; ?></option>
  <?php endforeach; ?>
</select>
        </div>
            

            <div class="form-group">
                <label for="year">Enter Year</label>
                <input type="text" name="year" class="form-control">
            </div>

              <div class="form-group">
                <label for="supervisor">Name of Examiner</label>
                <br>
                <?php
// Retrieve data from the database
$query = "SELECT * FROM `faculty`";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<select class="form-control" name="supervisor">
<option>Select Supervisor</option>
  <?php foreach ($data as $item): ?>
    <option value="<?php echo $item['department'];?>"<?php echo ($item['department'] == $_POST['dept']) ?'disabled' : '';?>><?php echo $item['first_name']; ?></option>
  <?php endforeach; ?>
</select>
            </div>

            

            <div class="form-group">
                <label for="total_stud">Enter Total Number of Students</label>
                <input type="number" name="total_stud" class="form-control">
            </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_allot" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<script>
function disableSelectedOption(selectedValue) {
  var supervisor = document.getElementsByName("supervisor")[0];
  for (var i = 0; i < supervisor.options.length; i++) {
    if (supervisor.options[i].value == selectedValue) {
        supervisor.options[i].disabled = true;
    } else {
        supervisor.options[i].disabled = false;
    }
  }
}
</script>


<?php include('footer.php'); ?> 

    