<?php 
        $con= mysqli_connect("localhost" , "root","","be_proj");
        error_reporting(0);

         $sr=$_GET['sr_no'];

     $sql ="select * from applications where sr_no='$sr'";
     $result=mysqli_Query($con,$sql);
     $num=mysqli_num_rows($result);
     $row=mysqli_fetch_assoc($result)
    ?>


<html>  
<head>  
    <title> Application status mail </title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
</head>
<style>
 .box
 {
  width:100%;
  max-width:600px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
 .banner
            {
                width: 100%;
                height: 100vh;
                background:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75));
                background-size: cover;
                background-position: center;
            }
 input.parsley-success,
 select.parsley-success,
 textarea.parsley-success {
   color: #468847;
   background-color: #DFF0D8;
   border: 1px solid #D6E9C6;
 }

 input.parsley-error,
 select.parsley-error,
 textarea.parsley-error {
   color: #B94A48;
   background-color: #F2DEDE;
   border: 1px solid #EED3D7;
 }

 .parsley-errors-list {
   margin: 2px 0 3px;
   padding: 0;
   list-style-type: none;
   font-size: 0.9em;
   line-height: 0.9em;
   opacity: 0;

   transition: all .3s ease-in;
   -o-transition: all .3s ease-in;
   -moz-transition: all .3s ease-in;
   -webkit-transition: all .3s ease-in;
 }

 .parsley-errors-list.filled {
   opacity: 1;
 }
 
 .parsley-type, .parsley-required, .parsley-equalto{
  color:#ff0000;
 }
.error
{
  color: green;
  font-weight: 700;
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


<?php
// include_once('connection.php');
// if(isset($_REQUEST['pwdrst']))
// {
//   $email = $_REQUEST['email'];
//   $check_email = mysqli_query($connection,"select email from staff where email='$email'");
//   $res = mysqli_num_rows($check_email);
//   if($res>0)
//   {
//     $message = '<div>
//      <p><b>Hello!</b></p>
//      <p>You are recieving this email because we recieved a password reset request for your account.</p>
//      <br>
//      <p><button class="btn btn-primary"><a href="http://localhost/user-login/passwordreset.php?secret='.base64_encode($email).'">Reset Password</a></button></p>
//      <br>
//      <p>If you did not request a password reset, no further action is required.</p>
//     </div>';

// include_once("SMTP/class.phpmailer.php");
// include_once("SMTP/class.smtp.php");

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;


// $email = $email; 
// $mail = new PHPMailer;
// $mail->IsSMTP();
// $mail->SMTPAuth = true;                 
// $mail->SMTPSecure = "tls";      
// $mail->Host = 'smtp.gmail.com';
// $mail->Port = 587; 
// $mail->Username = "sanjubhosale2002";   //Enter your username/emailid
// $mail->Password = "vqkhotptrhxcthbe";   //Enter your password
// $mail->FromName = "Tech Area";
// $mail->AddAddress($email);
// $mail->Subject = "Reset Password";
// $mail->isHTML( TRUE );
// $mail->Body =$message;

// //send-mail






// if($mail->send())
// {
//   $msg = "We have e-mailed your password reset link!";
// }
// }
// else
// {
//   $msg = "We can't find a user with that email address";
// }
// }

?>

<!-- send mail  -->

<?php
include_once('connection.php');
// $name = $_POST["name"];
// $email = $_POST["email"];
// $subject = $_POST["subject"];
// $message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true); 

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

if(isset($_REQUEST['send_mail']))
{
  
  $email = $_REQUEST['email'];
  $check_email = mysqli_query($conn,"select email from applications where email='$email'");
  $res = mysqli_num_rows($check_email);
  if($res>0)
  {
    $message = '<div>
     <p><b>Hello!</b></p>
     <p> Your Document is ready .. 
     <br>
      <p>You can collect your Document from college Examination Section..</p>
     <br>
    
    </div>';

// include_once("SMTP/class.phpmailer.php");
// include_once("SMTP/class.smtp.php");

$mail->SMTPDebug = SMTP::DEBUG_SERVER;



$email = $email; 
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "sanjubhosale2002@gmail.com";   //Enter your username/emailid
$mail->Password = "vqkhotptrhxcthbe";   //Enter your password
$mail->FromName = "Examination Portal";
$mail->AddAddress($email);
$mail->Subject = "Application status";
$mail->isHTML( TRUE );
$mail->Body =$message;

//send-mail






if($mail->send())
{
  $msg = "Email Sent Successfully ";
}
}
else
{
  $msg = "Can't find a user with that email address";
}
}

?>



 
<body>
<div class="banner" style="background-image: url(coe.jpg)"><br>
<button class="button" style="background-color:rgb(62, 5, 67); color: rgb(241, 241, 236); text-decoration:solid; font-weight: bold;font-size: 30px;" >Applications Mail</button>
         <button style="background-color:rgb(10, 112, 171); color: azure; float: right; vertical-align:middle" class="button" onclick="location.href='../view.php'"><span>BACK</span></button>
         <br>
         <br>
         <br>
         <br>

<div class="container">  
    <div class="table-responsive">  
    <h3 align="center">Application Mail </h3><br/>
    <div class="box">
    <?php 
        $con= mysqli_connect("localhost" , "root","","be_proj");
        error_reporting(0);

         $sr=$_GET['sr_no'];

     $query ="select * from applications where sr_no='$sr'";
     $query_run=mysqli_Query($con,$sql);
     if(mysqli_num_rows($query_run)>0)
     {
        foreach($query_run as $row)
        {
            //echo $row['sr'];
            ?>
     <form id="validate_form" method="post" >  
       <div class="form-group">
       <label for="email">Email Address</label>
       <input type="text" name="email" id="email" value="<?php echo $row['email'];?>" placeholder="Enter Email" required 
       data-parsley-type="email" data-parsley-trigg
       er="keyup" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" id="login" name="send_mail"  value="Send Mail" class="btn btn-success" />
       </div>
       
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
     </form>
     <?php
        }
    }
    else{
        "no record";
    }
    ?>
     </div>
   </div>  
  </div>
  </div>
</body>
</html>
