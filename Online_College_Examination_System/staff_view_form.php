<html>
<head>
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <style>
.parent
    {
         margin-top:30px;
         width:300px;
         
         padding:10px;
         /* background:  rgb(2,0,36) */
         background:rgb(2,0,36);
         }
    .std-file
    {
         height:250px;
    }
            
</style>
</head>
</html>
    


<?php
include_once 'connection.php';

$sql_status=mysqli_query($conn,'select * from exam_form');
$total_rows=mysqli_num_rows($sql_status);
echo"<div class='d-flex flex-wrap'>";

for($i=0;$i<$total_rows;$i++)
{
    $row=mysqli_fetch_assoc($sql_status);
    //print_r($row);
    $std_id=$row['id'];
    $name=$row['name'];
    $mail=$row['email'];
    $class=$row['class'];
    $dept=$row['department'];
    $file=$row['file'];
    //echo"<img class='prod-img'src='$imgname'>";

   echo"
    <div class='ml-4 parent'>

       <div class='d-flex justify-content-between'>
               <h3 class='text-white'>$name</h3>
               <h4 class='text-white'>$mail</h4>
        </div>
         
        <img class='std-file w-100' src='$file'>
        <p class='text-white'>$class</p>
        <p class='text-white'>$dept</p>

        <div class='d-flex justify-content-around'>
            <a href='view_form.php?std_id=$std_id'>    
             <button class='btn btn-warning'><i class=' text-white fa fa-edit'></i></button>
             </a>
            <a href='action.php?std_id=$std_id'>
             <button class='btn btn-danger'><i class='text-white fa fa-trash'></i></button>
             </a>
        </div>

   </div>";
}

echo "</div>";


?>