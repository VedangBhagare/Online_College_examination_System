





<?php 
        $con= mysqli_connect("localhost" , "root","","be_proj");
        error_reporting(0);

         $sr=$_GET['sr'];

     $sql ="select * from notices where sr='$sr'";
     $result=mysqli_Query($con,$sql);
     $num=mysqli_num_rows($result);
     $row=mysqli_fetch_assoc($result)
    ?>
<!DOCTYPE html>

<head>
    <title>Notices_CEO</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices_section</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .banner
        {
            width: 100%;
            height: 100%;
            background:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75));
            background-size: cover;
            background-position: center;
        }
        .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 8px 4px;
                cursor: pointer;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
            }
            .button2:hover {
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
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

            .navbar {
                                width: 20%;
                                margin-top: 10px;
                                margin: auto;
                                padding: 35px 0;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                        }
                        .navbar ul li{
                                list-style: none;
                                display: inline-block;
                                margin-left: 20px;
                                margin-right: 10px;
                                position: relative;
                        }
                        .navbar ul li a{
                                text-decoration: none;
                                color: rgb(248, 246, 246);
                                text-transform: uppercase;
                        }
                        .navbar ul li::after{
                                content: '';
                                height: 3px;
                                width: 0;
                                background: rgb(22, 17, 17);
                                position: absolute;
                                left: 0;
                                bottom: -10px;
                                transition: 0.5s;
                        }
                        .navbar ul li:hover::after{
                                width: 100%;
                        }
    </style>
</head>

<body>
    
<div class="banner" style="background-image: url(coe.jpg)">                 
    <button class="button" style="background-color:rgb(62, 5, 67); color: rgb(241, 241, 236); text-decoration:solid; font-weight: bold;font-size: 30px;" >Update Notice</button>
    <button style="background-color:rgb(10, 112, 171); color: azure; float: right; vertical-align:middle" class="button " onclick="location.href='coe_notice.php'"><span>BACK</span></button>
    

    </nav>
    </br>
    </br>
    </br>

<div class="panel panel-default">
              <div class="panel-heading">
            <h2 class="panel-title center-block">Update Notice</h2>
</div>

<div class="panel-body">
<?php 
        $con= mysqli_connect("localhost" , "root","","be_proj");
        error_reporting(0);

         $sr=$_GET['sr'];

     $query ="select * from notices where sr='$sr'";
     $query_run=mysqli_Query($con,$sql);
     if(mysqli_num_rows($query_run)>0)
     {
        foreach($query_run as $row)
        {
            //echo $row['sr'];
            ?>
            <form role="form" action="" method="post" enctype="multipart/form-data">
            <div class="input-group col-lg-40 col-md-40 col-sm-40 col-xs-40">
                 <div class="form-group " >
                      <input type="hidden" name="sr" value="<?php echo $row['sr'];?>">
                      <label >Date</label><br>  
                      <input type="date" name="dt" value="<?php echo $row['date'];?>"> <br><br> 
                      <label for="name">Write Notice</label>
                      <textarea class="form-control" rows="5" cols="50" draggable="false" name="news"><?php echo $row['write_notice'];?>
                      </textarea><br>
                      <label for="file"><h5>Upload Image</h5></label><br>
                      <input type="file" name="media_img" ><br><br>
                     <input type="hidden" name="media_img_old" value="<?php echo $row['media_img'];?>" >
                      <br>
                      <img src="<?php echo "images/".$row['media_img'];?>" width=100px >
                       <br><br>
                       <div class="input-field"><br>
                       <input type="submit" class= "btn btn-primary"name="update" value="update details">
                       </div>
                       </div> 
                
            </div><br>
            <!-- <button style="background-color:rgb(10, 112, 171); color: azure;" class="btn btn-primary" name="submit" type="submit" formaction="coe_notice.php">View Notices</button> -->
            
</div>
                    
</form>
            <?php
        }
    }
    else{
        "no record";
    }
    ?>
</div>

</body>
</div>
</html>
<?php
//session_start();
if(isset($_POST['update'])){

//$sr=$_POST['sr'];    
$Notice=$_POST['news'];
$date=$_POST['dt'];
$new_img=$_FILES['media_img']['name'];
$old_img=$_POST['media_img_old'];

if($new_img!='')
{
    $update_filename=$_FILES['media_img']['name'];
    //$filename= $_FILES["media_img"]["name"];
    $tempname=$_FILES["media_img"]["tmp_name"];
    $folder="images/".$update_filename;
    $has_file_upload=move_uploaded_file($tempname,$folder);
    unlink("images/".$old_img);

} 
else
{
    $update_filename=$_POST['media_img_old'];
    $folder=$update_filename;
    
}


      $sql="UPDATE notices SET write_notice='$Notice', date='$date',sr='$sr',media_img='$folder' WHERE sr='$sr'";
      $result=mysqli_Query($con,$sql);

      if($result){
         
        //if($_FILES['media_img']['name']!='')
        //{
            // $filename= $_FILES["media_img"]["name"];
            // $tempname=$_FILES["media_img"]["tmp_name"];
            // $folder="images/".$filename;
            // $has_file_upload=move_uploaded_file($tempname,$folder);
            //move_uploaded_file($_FILES["media_img"]["tmp_name"],"images/". $_FILES["media_img"]["name"]);
            //unlink("images/".$old_img);

            //unlink("images/".$old_img);

        //}

        echo "updated";
        header('location:coe_notice.php');
      }
      else{
             echo "updated";
      }
}

?>
