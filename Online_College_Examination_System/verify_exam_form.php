<?php
include_once 'connection.php';
$sql=mysqli_query($conn,"select * from exam_form where  status='2'");

if(isset($_GET['id']) && isset($_GET['mail_status'])) {
    $id=$_GET['id'];
    $mail_status=$_GET['mail_status'];
    
    mysqli_query($conn,"update exam_form set mail_status='$mail_status' where id='$id'");
    header("location:verify_exam_form.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device,initial-scale=1">
        <title>Office Exam Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style type="text/css">
            
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
                padding: 5px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 8px 4px;
                cursor: pointer;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
            }
            *{
                padding:0;
                margin:0;
                box-sizing:border-box;
            }
            body{
                background:#ccc;
                display:flex;
                justify-content:center;
                
            }
            .container{
                
                width:100%;
                max-width:100%;
                margin:10rem auto;
                
                }
            .container table{
                width:100%;
                margin:auto;
                border-collapse:collapse;
                font-size:21px;

            }   
            .container table th{
                
                text-align: center;
                background:rgb(62, 5, 67);
                color:#fff;
            } 
            select{
                width:100%;
                padding:0.5rem 0;
                font-size:1rem;
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
            
        </style>
    </head>
    <body>
    <div class="banner"style="background-image: url('coe.jpg');">
    <button class="button" style="background-color:rgb(62, 5, 67); color: rgb(241, 241, 236); text-decoration:solid; font-weight: bold;font-size: 30px;" >Verified Exam Forms</button>

    
    <button style="background-color:rgb(10, 112, 171); color: azure; float: right; vertical-align:middle" class="button " onclick="location.href='office_home_page.html'"><span>BACK</span></button>

        
        <div class="container">
            <table border="1">
                <tr>
                    
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>PRN</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Exam Form</th>
                    <th>Mail</th>
                    <th>Mail Status</th>
                    <th>Action</th>
                    
                </tr>
                 
                <?php
                $i=1;
                if(mysqli_num_rows($sql)>0){
                    while($row=mysqli_fetch_assoc($sql)){?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['prn']?></td>
                        <td><?php echo $row['class']?></td>
                    <td><?php echo $row['department']?></td>
                    <td><a href='<?php echo $row['file']?>'>"<?php echo $row['file']?>"</a></td>
                    <td><a href='exam_form_office_mail/exam_send_mail_stud.php?id=<?php echo $row['id'];?>' class='btn btn-secondary'>Send Mail</a></td>


                        <td>
                            <?php
                            if($row['mail_status']==1)
                            {
                             echo "Pending";
                            }
                            if($row['mail_status']==2)
                            {
                             echo "Sent";
                            }
                            
                            ?>
                        </td>
                        <td>
                            <select onchange="status_mail_update(this.options[this.selectedIndex].value,'<?php echo $row['id']?>')">
                                <option value="">Update Status</option>
                                <option value="1">Pending</option>
                                <option value="2">Sent</option>
                            </select>
                        </td>


                        </tr>
                <?php }
                } ?>
                
            </table>
            </div>
            </div>

            <script type="text/javascript">
                function status_mail_update(value,id){
                    //alert(id);
                    let url="http://localhost/Final_year/verify_exam_form.php";
                    window.location.href=url+"?id="+id+"&mail_status="+value;
                }
                </script>
           
            </body>
</html>
