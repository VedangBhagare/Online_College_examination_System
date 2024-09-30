
<?php include('dbcon.php'); ?> 


<?php   //included for drop
$con = mysqli_connect("localhost","root","","be_proj");
$s = mysqli_query($con,"SELECT * FROM `department`");

?>

<?php   //included for drop
$cont = mysqli_connect("localhost","root","","be_proj");
$t = mysqli_query($cont,"SELECT * FROM `faculty`");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Billing</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="banner" style="background-image: url(coe.jpg)">
    <button class="button" style="background-color:rgb(62, 5, 67); color: rgb(241, 241, 236); text-decoration:solid; font-weight: bold;font-size: 30px;" >Welcome to Billing Section</button>
    <button style="background-color:rgb(10, 112, 171); color: azure; float: right; vertical-align:middle" class="button " onclick="location.href='../staff_home_page.html'"><span>BACK</span></button>
    <br><br>
    <div class="container">


<div class="box1">
<h2>RECORDS</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD</button>
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
    <form action="" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add bill</h5>
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
                <select name="p_t_o" class="form-control">
                  <option>Select</option>
                  <option>PR</option>
                  <option>TW</option>
                  <option>OR</option>
                </select>
            </div>

    
            <div class="form-group">
                <label for="no_stud">No. of Students</label>
                <input type="number" name="no_stud" class="form-control">
            </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input formaction="staff_bill_insert.php" type="submit" class="btn btn-success" name="add" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>


<?php include('ffooter.php'); ?> 


<?php
// include 'dbcon.php';

// if(isset($_POST['add'])){
    
//     $name = $_POST['name'];  // names in [] should be exactly same as names in form i.e <input type="text" name="f_name" class="form-control">
//     $category = $_POST['category'];
//     $dept = $_POST['dept'];
//     $subject = $_POST['subject'];
//     $year = $_POST['year'];
//     $date_from = $_POST['date_from'];
//     $date_to = $_POST['date_to'];
//     $pto = $_POST['p_t_o'];
//     $nostud = $_POST['no_stud'];
//     $total = ($nostud * 5);

//     //     if($name == "" || empty($name)){
//     //     header('location:staff_billing.php?message=fill the first name !'); //form validation
//     // }

//     // else{
//         $query = "INSERT INTO `billing` (`NAME`, `CATEGORY`, `DEPARTMENT`, `SUBJECT`, `CLASS`, `DATE_FROM`, `DATE_TO`, `PR/OR/TW`, `NO_OF_STUDENTS`, `TOTAL`) VALUES ('$name', '$category', '$dept', '$subject', '$year', '$date_from', '$date_to', '$pto', '$nostud', '$total')";

//         $result = mysqli_query($connection, $query);

//         if($result){
//             //die("Query Failed".mysqli_error());
//             header('location:staff_billing.php');
//         }
//         else{

//           echo "error";
//              //to redirect user 
//         }
//     }
// // }
?>