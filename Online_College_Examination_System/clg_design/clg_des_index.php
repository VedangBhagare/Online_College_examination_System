<?php include('header.php'); ?> 
<?php include('dbcon.php'); ?> 


<div class="box1">
<h2>DESIGN</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD BLOCK</button>
<br><br>

</div>

    <table class="table table-hover tablefa-bordered table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Floor</th>
                <th>Block No.</th>
                <th>Capacity</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `block`";  // query to select data
            $result = mysqli_query($connection, $query); // holds connection

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                    ?>

            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['floor']." Floor";?></td>
                <td><?php echo "Block No. ".$row['bno'];?></td>
                <td><?php echo $row['capacity']." Benches";?></td>
                <td><a href="clg_des_update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
                <td><a href="clg_des_delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>

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
<form action="clg_des_insert_2.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Block</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

            <div class="form-group">
                <label for="floor">Enter Floor</label>
                <select name="floor" class="form-control">
                  <option>Select</option>
                  <option>Ground Floor</option>
                  <option>1 st Floor</option>
                  <option>2 nd Floor</option>
                  <option>3 rd Floor</option>
                  <option>4 th Floor</option>
                </select>
                <!-- <input type="text" name="floor" class="form-control"> -->
            </div>


            <div class="form-group">
                <label for="bno">Enter Block Number :</label>
                <input type="number" name="bno" class="form-control">
            </div>


            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" class="form-control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_block" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>



<?php include('footer.php'); ?> 

    