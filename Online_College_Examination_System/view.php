<?php error_reporting(E_ALL^E_NOTICE);
      error_reporting(0);      
?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "be_proj";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if(!$conn){
   die("Connection failed : ".mysqli_connect_error());
}


  

 // include 'applications_insert.php';
// write a query to retrieve data
$sql = "SELECT sr_no, prn, fullname, email, contact, department, years, application_type, transcripts, word, status FROM applications";

// execute the query
$result = $conn->query($sql);
if(isset($_GET['sr_no']) && isset($_GET['status'])) {
  $sr_no=$_GET['sr_no'];
  $status=$_GET['status'];
  mysqli_query($conn,"update applications set status='$status' where sr_no='$sr_no'");
  header("location:view.php");
}

// fetch the data and store it in a variable
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

// close the connection
//$conn->close();
?>

<!-- HTML code -->
<!DOCTYPE html>
<html>
<head>
  <title>Application Received</title>
  <style>
    body{
        background-image : url('coe.jpg');
        background-size: cover;
        width: 98%;
        height: 100vh;
        background-position: center;
    }
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        padding-right: 10px;
    }
    .button 
            {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;       
            }
            .button1{
                    display: inline-block;
                    border-radius: 4px;
                    background-color: #f4511e;
                    border: none;
                    color: #FFFFFF;
                    text-align: center;
                    font-size: 28px;
                    padding: 20px;
                    width: 200px;
                    transition: all 0.5s;
                    cursor: pointer;
                    margin: 5px;
                    }
                    .button span {
                                    cursor: pointer;
                                    display: inline-block;
                                    position: relative;
                                    transition: 0.5s;
                                    }

                                    .button span:after {
                                    content: '\00bb';
                                    position: absolute;
                                    opacity: 0;
                                    top: 0;
                                    right: -20px;
                                    transition: 0.5s;
                                    }

                                    .button:hover span {
                                    padding-right: 25px;
                                    }

                                    .button:hover span:after {
                                    opacity: 1;
                                    right: 0;
                                    }
  </style>
</head>
<body>
<button class="button" style="background-color:rgb(62, 5, 67); color: rgb(241, 241, 236); text-decoration:solid; font-weight: bold;font-size: 30px;" >Application</button>
    <button style="background-color:rgb(10, 112, 171); color: azure; float: right; vertical-align:middle" class="button " onclick="location.href='coe_home_page.html'"><span>BACK</span></button>
    <br>
    <br>
    <br>
    <br>
  <table>
    <thead>
      <tr>
        <th>Serial Number</th>
        <th>PRN</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Department</th>
        <th>Year</th>
        <th>Application Type</th>
        <th>Transcripts</th>
        <th>Word File</th>
        <th>Status</th>
        <th>Action</th>
        <th>mail</th>

      </tr>
    </thead>
    
    <tbody>
      <?php foreach ($data as $row) { ?>
      <tr>
        
        <td><?php echo $row['sr_no'];?></td>
        <td><?php echo $row['prn']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['contact']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['years']; ?></td>
        <td><?php echo $row['application_type']; ?></td>
        <td><a href="Transcripts/<?php echo $row['transcripts']; ?>"><?php echo $row['transcripts']; ?></a></td>
        <td><a href="Word_Files/<?php echo $row['word'];?>"><?php echo $row['word']; ?></a></td>
        <td>
                            <?php
                            if($row['status']==1)
                            {
                             echo "Pending";
                            }
                            if($row['status']==2)
                            {
                             echo "Completed";
                            }
                            if($row['status']==3)
                            {
                             echo "Reject";
                            }
                             ?>
                        </td>
                        <td>
                            <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['sr_no']?>')">
                                <option value="">Update Status</option>
                                <option value="1">Pending</option>
                                <option value="2">completed</option>
                                <option value="3">Reject</option>
                            </select>
                        </td>
                        <td><a href='Application_mail/send_application_mail.php?sr_no=<?php echo $row['sr_no']; ?>' class='btn btn-primary'>Mail</a></td>
          
      </tr>
          
      <?php } ?>
    </tbody>
  </table>
  <script type="text/javascript">
                function status_update(value,sr_no){
                    //alert(id);
                    let url="http://localhost/Final_year/view.php";
                    window.location.href=url+"?sr_no="+sr_no+"&status="+value;

                }
            </script>
</body>
</html>


