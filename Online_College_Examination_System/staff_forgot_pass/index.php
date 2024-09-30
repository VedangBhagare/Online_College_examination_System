


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>staff Registration</title>
    <link rel="stylesheet" href="student_reg.css">
</head>

<?php
include_once('connection.php');
session_start();
if(isset($_REQUEST['login']))
{
  $email = $_REQUEST['email'];
  $pwd = md5($_REQUEST['pwd']);
  $select_query = mysqli_query($connection,"select * from staff where email='$email' and password='$pwd'");
  $res = mysqli_num_rows($select_query);
  if($res>0)
  {
    $data = mysqli_fetch_array($select_query);
    $name = $data['name'];
    $_SESSION['name'] = $name;
    header('location:dashboard.php');
  }
  else
  {
    $msg = "Invalid Credentials";
  }
}

?>
<body>
<div class="center">
        <h1>Staff Login</h1>
        <form method="post" action="staff_login.php" >
            <div class="txt_field">
                <input type="email"  name="email"  required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pwd"  required>
                <span></span>
                <label>PASS</label>
            </div>
            <label for="forgotpassword"><a href="forgot.php">Forgot password?</a></label>
            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member?<a href="staff_reg.html">Registration</a>
            </div>
            <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
        </form>
</body>
</html>