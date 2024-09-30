<?php //display data
       $con= mysqli_connect("localhost" , "root","","be_proj");
       if(!$con){
        echo "not connected";
     }
    

     $sql ="select * from notices";
     $result=mysqli_Query($con,$sql);
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
    <button class="button" style="background-color:rgb(62, 5, 67); color: rgb(241, 241, 236); text-decoration:solid; font-weight: bold;font-size: 30px;" >Notices</button>
    <button style="background-color:rgb(10, 112, 171); color: azure; float: right; vertical-align:middle" class="button " onclick="location.href='coe_home_page.html'"><span>BACK</span></button>
    <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
        <div class="navbar-header">
        
        
        </div>
   
        </nav>

        </br>
        <div class="container slide2">
			
			  <div class="panel-heading">
		  	<div class="row">
		  		<h3 class="center-block" style="font-size: 30px;">Publish Notices</h3>
			</div>
		  </div>

<table class="table table-bordered" style="font-size: 15px;">

            <thead>
                <tr>
                        <th>Sr</th>
                        <th>Notice</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                </tr>
                
               
                    <?php
                    $num=mysqli_num_rows($result);
//$folder="images/".$row['media_img'];
                    if($num>0){
                    while($row=mysqli_fetch_assoc($result))
                    {
                    echo "
                    <tr>
                    <td>".$row['sr']."</td>
                    <td>".$row['write_notice']."</td>
                    <td><a href='".$row['media_img']."'>".$row['media_img']."</a></td>
                    
                    <td>".$row['date']."</td>
                    
                    <td><a href='demoedit.php?sr=$row[sr]' class='btn btn-primary'>Edit</a></td>
                    <td><a href='delete_notice.php?sr=$row[sr]' class='btn btn-danger'>Delete</a></td>
                    </tr>

                    ";
                    }
                }
                ?> 
                
          </thead>

          <!-- <td><td><td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td></td></td> -->

          </div>
</table>
<br>
<br>
<br>

<div class="panel panel-default">
				  <div class="panel-heading">
				    <h2 class="panel-title center-block">Publish New Notices</h2>
</div>

<div class="panel-body">
	    <form role="form" action="ceo_notices.php" method="post" enctype="multipart/form-data">
				<div class="input-group col-lg-40 col-md-40 col-sm-40 col-xs-40">
					 <div class="form-group ">
                          <label class="label" for="dt"><h5>Date</h5></label><br>
                           <input type="date" name="dt" ><br><br>

					      <label for="name"><h5>Write New Notice</h5></label>   
					       <textarea class="form-control" rows="5" cols="50" draggable="false" name="news">
					       </textarea><br>

                           <label for="file"><h5>Upload Image</h5></label><br>
                           <input type="file" name="media_img"><br><br>

                           <!-- <input type="submit" name="submit" value="upload file"><br><br> -->
                           
                           <!-- <label for="file"><h5>Upload Images or Files here</h5></label><br><br>
                           <input type="file" name="file"><br>
                           <input type="submit" name="submitFile" value="Upload File">
                           <br> -->
                           
                           </div> 
					
				</div><br>
	<div class="input-group pull-right">
		<div class="form-group">
			<button style="background-color:rgb(10, 112, 171); color: azure;" class="btn btn-primary" name="submit">SUBMIT</button>
		</div>
	</div>
        				
    </form>
</div>

    </body>
</div>
</html>





