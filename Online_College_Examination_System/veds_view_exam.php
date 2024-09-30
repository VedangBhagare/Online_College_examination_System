
<?php include('connection.php'); ?> 

<?php   //included for drop
$con = mysqli_connect("localhost","root","","be_proj");
$s = mysqli_query($con,"SELECT * FROM `department`");

?>

<html>
    <head>
        <title>Exam dashboard</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                font-family: sans-serif;
            }
            .banner
            {
                width: 100%;
                height: 100vh;
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

                        .dropbtn {
                                background-color: #04AA6D;
                                color: white;
                                padding: 16px;
                                font-size: 16px;
                                border: none;
                                }

                                .dropdown {
                                position: relative;
                                display: inline-block;
                                }

                                .dropdown-content {
                                display: none;
                                position: absolute;
                                background-color: #f1f1f1;
                                min-width: 160px;
                                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                z-index: 1;
                                }

                                .dropdown-content a {
                                color: black;
                                padding: 12px 16px;
                                text-decoration: none;
                                display: block;
                                }

                                .dropdown-content a:hover {background-color: #ddd;}

                                .dropdown:hover .dropdown-content {display: block;}

                                .dropdown:hover .dropbtn {background-color: #3e8e41;}

                        
        </style>
    </head>

<body>
    <div class="banner"style="background-image: url('coe.jpg');">
    <button class="button" style="background-color:rgb(62, 5, 67); color: rgb(241, 241, 236); text-decoration:solid; font-weight: bold;font-size: 30px;" >View Exam Forms</button>
    <button style="background-color:rgb(10, 112, 171); color: azure; float: right; vertical-align:middle" class="button " onclick="location.href='staff_home_page.html'"><span>BACK</span></button>
    <div class="navbar" >
        <ul>
            <br><br><br><br><br><br>
            <button class="button button2" style="background-color: #654caf; color: white; text-decoration: solid; padding: 20px 50px;" onclick="location.href='fe_exam_form.php'"><span>FE</span></button>
            <br><br>
            <div class="dropdown">
            <button class="button button2" style="background-color: #c91922; color: white; text-decoration: solid; padding: 20px 65px;" onclick="location.href='#'" ><span>Departments</span></button>
            <div class="dropdown-content">
                <a href="#">Computer</a>
                <a href="#">Civil</a>
                <a href="#">Electrical</a>
                <a href="#">ENTC</a>
                <a href="#">Mechanocal</a>
                

                


                
            </div>
            </div>
            <br><br>
            <button class="button button2" style="background-color: #5ecd52; color: white; text-decoration: solid; padding: 20px 22px;"onclick="location.href='mca_exam_forms.php'"><span>MCA</span></button>
        </ul>
    
    </div>
</div>
</body>

</html>

