<?php include('header.php'); ?> 
<?php include('dbcon.php'); ?> 

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    
            $query = "SELECT * FROM `block` where `id` = '$id'";  // query to select data
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

if(isset($_POST['update_des'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $floor = $_POST['floor'];  
    $bno = $_POST['bno'];
    $capacity = $_POST['capacity'];

    $query = "UPDATE `block` SET `floor` = '$floor', `bno` = '$bno', `capacity` = '$capacity'  WHERE `id` = '$idnew'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:clg_des_index.php?update_msg=you have successfully updated data');
    }
}

?>

<form action="clg_des_update.php?id_new=<?php echo $id; ?>" method="post"> 

<div class="form-group">
                <label for="floor">Enter Floor</label>
                <input type="text" name="floor" class="form-control">
            </div>


            <div class="form-group">
                <label for="bno">Enter Block Number :</label>
                <input type="number" name="bno" class="form-control">
            </div>


            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" class="form-control">
            </div>
            <input type="submit" class="btn btn-success" name="update_des" value="UPDATE">
</form>


<?php include('footer.php'); ?> 