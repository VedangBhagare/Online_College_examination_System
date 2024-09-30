<?php include('header.php'); ?> 
<?php include('dbcon.php'); ?> 

<?php   //included for drop
$con = mysqli_connect("localhost","root","","be_proj");
$s = mysqli_query($con,"SELECT * FROM `department`");

?>

<div class="box1">
<h2>FACULTY</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD FACULTY</button>
</div>

    <table class="table table-hover tablefa-bordered table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Email ID</th>
                <th>Contact No.</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `faculty`";  // query to select data
            $result = mysqli_query($connection, $query); // holds connection

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                    ?>

            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['department'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['c_no'];?></td>
                <td><a href="update_page_1.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a></td>
                <td><a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>

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
    <form action="insert_data.php" method="post">
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
                <label for="f_name">Enter name</label>
                <input type="text" name="f_name" class="form-control">
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
                <input type="text" name="e_mail" class="form-control">
            </div>

            <div class="form-group">
                <label for="co_no">Contact No.</label>
                <input type="text" name="co_no" class="form-control">
            </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_faculty" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<?php include('footer.php'); ?> 

    