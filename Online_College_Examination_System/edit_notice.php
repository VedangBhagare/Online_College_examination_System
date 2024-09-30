<!-- php for edit notices -->
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
</style>
</head>

<body>    
<div class="banner" style="background-image: url(coe.jpg)">
<div class="container">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
    
    <a class="navbar-brand" style="background-color:rgb(62, 5, 67); font-weight: bold;font-size: 25px;color: rgb(241, 241, 236);" href="#"><mark>Notices</mark></a>
    </div>
    <button style="background-color:rgb(10, 112, 171); color: azure;" class="btn btn-danger navbar-btn ">Logout</button>
    </div>
    </nav>
    </br>

    <div class="panel panel-default">
    <div class="panel-heading">
    <h2 class="panel-title center-block">Update Notice</h2>
    </div>

    <div class="panel-body">
    <form role="form" action="#" method="post" enctype="multipart/form-data">
            <div class="input-group col-lg-40 col-md-40 col-sm-40 col-xs-40">
                 <div class="form-group " >
                    <label >Date</label><br>  
                    <input type="date" name="dt" value="<?php echo $row['date'];?>"> <br><br> 
                    <label for="name">Write Notice</label>
                    <textarea class="form-control" rows="5" cols="50" draggable="false" name="news"><?php echo $row['write_notice'];?>
                    </textarea><br>
                    <label for="file"><h5>Upload Image</h5></label><br>
                    <input type="file" name="media_img" value="<?php echo $row['media_img'];?>"><br><br>
                    <br>
                    <br><br>
                    <div class="input-field"><br>
                    <input type="submit" class= "btn btn-primary"name="update" value="update details">
                    </div>
                    </div> 
            </div><br>
            <button style="background-color:rgb(10, 112, 171); color: azure;" class="btn btn-primary" name="submit" type="submit" formaction="coe_notice.php">View Notices</button>
            <!-- <input type="submit" name="update" value="update details"> -->
<!-- <div class="input-group pull-right">
    <div class="form-group">
        <input type="submit" name="submit" value="update details">
         <button style="background-color:rgb(10, 112, 171); color: azure;" class="btn btn-primary" name="submit">submit</button> 
    </div> -->
</div>
                    
</form>
</div>

</body>
</div>
</html>

<?php
//  if($_POST['update']){
//     $filename= $_FILES["media_img"]["name"];
//     $tempname=$_FILES["media_img"]["tmp_name"];
//     $folder="images/".$filename;
   
//     echo $folder;
//     move_uploaded_file($tempname,$folder);

//     $Notice=$_POST['news'];
//     $date=$_POST['dt'];

//     $img_url=$_POST['media_img'];
//     // $fileName=$img_url;

//     // if($_FILES['media_img']['error']==0){
//     //     $name=uniqid(time());
//     //     $extension=pathinfo($_FILES['media_img']['name'],PATHINFO_EXTENSION);
//     //     $fileName=$name.".".$extension;
//     //     $hasFileUploaded= move_uploaded_file($_FILES['media_img']['tmp_name'],"images/".$fileName);

//     // }
   
//     $sql="UPDATE notices SET write_notice='$Notice', date='$date',media_img='$img_url' WHERE sr='$sr'";
    
//     $result=mysqli_query($con,$sql);

//     if($result){

//         // if($hasFileUploaded){
//         //     unlink("images/".$img_url);
//         // }
//         echo "updated";
//     }
//     else{
//         echo "not updated";
//     }
//  }




if($_POST['update']){
    //     $filename= $_FILES["media_img"]["name"];
    //     $tempname=$_FILES["media_img"]["tmp_name"];
    //     $folder="images/".$filename;
       
    //     echo $folder;
    //     move_uploaded_file($tempname,$folder);
    
        $Notice=$_POST['news'];
        $date=$_POST['dt'];
        //$img_url=$_POST['media_img'];
        //$fileName=$img_url;
    
        if($_FILES['media_img']){
            $img_url= $_FILES["media_img"]["name"];
            $tempname=$_FILES["media_img"]["tmp_name"];
            $folder="images/".$img_url;
            $hasFileUploaded=move_uploaded_file($tempname,$folder);
           // $tempname=$_FILES["media_img"]["name"];
            
       
           // echo $folder;
    
    //$hasFileUploaded= move_uploaded_file($_FILES['media_img']['tmp_name'],"images/".$img_url);
    
            }
        if($hasFileUploaded){
        $sql="UPDATE notices SET write_notice='$Notice', date='$date', media_img='$folder' WHERE sr='$sr'";
        $result=mysqli_Query($con,$sql);

        if($result){
            echo "updated";
        }
        else{
            echo "not updated";
        }
    }
}
   
   
   
   
       
        // $sql="UPDATE notices SET write_notice='$Notice', date='$date', media_img='$img_url' WHERE sr='$sr'";
        
        //$result=mysqli_query($con,$sql);
    
        //if($result){
    
           // if($hasFileUploaded){
           //     unlink("$img_url");
           // }
         //   echo "updated";
        //}
        //else{
         //   echo "not updated";
        //}
    // }
?>


