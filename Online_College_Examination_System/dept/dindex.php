<?php include('dheader.php'); ?> 
<?php include('dbcon.php'); ?> 


<div class="box1">
<h2>Department</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >ADD DEPARTMENT</button>
</div>

    <table class="table table-hover tablefa-bordered table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Department</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `department`";  // query to select data
            $result = mysqli_query($connection, $query); // holds connection

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                    ?>

            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['department'];?></td>
                <td><a href="dupdate.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a></td>
                <td><a href="dedelete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>

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
    <form action="dinsert.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="form-group">
                <label for="dept">Department</label>
                <input type="text" name="dept" class="form-control">
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

<?php include('dfooter.php'); ?> 

    