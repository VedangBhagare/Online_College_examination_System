<?php //display data
       $con= mysqli_connect("localhost" , "root","","be_proj");
       if(!$con){
        echo "not connected";
     }
    

     $sql ="select * from notices";
     $result=mysqli_Query($con,$sql);
    ?> 


<html>

    <head>
        <title>Welcome</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
        <style>
            *{
    padding: 0;
    margin: 0;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;

}

body{
    font-family: montserrat;

}
nav{
    background: #585b6a;
    height: 80px;
    width: 100%;

}
label.logo{
    color: white;
    font-size: 50px;
    line-height: 80px;
    padding: 0 100px;
    font-weight: bold;

}
nav ul{
    float:right;
    margin-right: 20px;

}

nav ul li{
    display: inline-block;
    line-height: 80px;
    margin: 0 5px;
}

nav ul li a{
    color: white;
    font-size: 17px;
    padding:7px 13px ;
    border-radius: 4px;
    text-transform: uppercase;
}

a.active, a:hover{
    background: #b7a6e4;
    transition: .8s;
}

/* css for image slider  */

#slider {
	overflow: hidden;
}

@keyframes slider {
	0% { left: 0; }
	30% { left: 0; }
	33% { left: -100%; }
	63% { left: -100%; }
	66% { left: -200%; }
	95% { left: -200%; }
	100% { left: 0; }
}
#slider figure {
	width:300%;
	position: relative;
	animation: 9s slider infinite;
}

#slider figure:hover {
	/*animation-play-state: paused; enable for pause on hover*/
}
#slider figure img {
	width: 33.333333333%;
	height : 550px;
	float: left;
}
        
        </style>
    </head>
    <body>
        <!-- <div class="banner" style="background-image: url(College-Photo.jpg)">
            <div class="navbar">
                <img src="clglogo.jpg" class="logo" style="background:linear-gradient(rgba(0,0,0.25,0.75),rgba(0,0,25,0.75));">
                <ul>
                    <li><a href="login.html"><button class=" btn btn-primary">Login</button></a></li>
                </ul>

            </div>
        </div> -->



        <nav>
        <label for="" class="logo">Online Examination System</label>

        <ul>
            <li><a class="active" href="#">Home</a></li>
            <li><a href="contact.html">About</a></li>
            <!-- <li><a href="#">Service</a></li>
            <li><a href="#">contact</a></li> -->
            <li><a href="login.html">login</a></li>
        </ul>
    </nav>

   <br>

<div>
    <center><img src="LEFT.png" alt=""></center>
</div>

<center>
    <div id="slider">
        <figure>
              <img src="College-Photo.jpg">
              <img src="image.jpg">
              <img src="image2.jpg">
        </figure>
  </div>
</center>
<br><br>
<marquee behavior="" direction="right"><h3>Check Latest Notices Here...   R.H.Sapat College Of Engineering, Nashik.</h3></marquee>

<div class="container slide2">
    <center><h1><strong>Notices</strong></h1></center>
        <table class="table table-bordered" style="font-size: 15px;" >

            <thead>
                <tr  class="bg-info">
                        <th>Sr</th>
                        <th>Notice</th>
                        <th>Image</th>
                        <th>Date</th>
                </tr>
               
                    <?php
                    $num=mysqli_num_rows($result);
                    if($num>0){
                    while($row=mysqli_fetch_assoc($result))
                    {
                    echo "
                    <tr>
                    <td>".$row['sr']."</td>
                    <td>".$row['write_notice']."</td>
                    <td><a href='".$row['media_img']."'>".$row['media_img']."</a></td>
                    
                    <td>".$row['date']."</td>
                    </tr>

                    ";
                    }
                }
                ?> 
                
          </thead>
            </div>
          <!-- <td><td><td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td></td></td> -->

          </div>
</table>
    </body>
</html>