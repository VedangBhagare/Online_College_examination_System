<?php
include_once 'connection.php';
$sql=mysqli_query($conn,"select * from exam_form where class='TE' and department='e&tc' and divi='a'");

if(isset($_GET['id']) && isset($_GET['status'])) {
    $id=$_GET['id'];
    $status=$_GET['status'];
    mysqli_query($conn,"update exam_form set status='$status' where id='$id'");
    header("location:update_status_entc_te_a.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device,initial-scale=1">
        <title>E&TC TE A Exam Form status</title>
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
                max-width:80%;
                margin:10rem auto;
                
                }
            .container table{
                width:100%;
                margin:auto;
                border-collapse:collapse;
                font-size:21px;

            }   
            .container table th{
                background:rgb(62, 5, 67);
                color:#fff;
            } 
            select{
                width:100%;
                padding:0.5rem 0;
                font-size:1rem;
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
    <div class="banner"style="background-image: url('coe.jpg');">
    <button class="button" style="background-color:rgb(62, 5, 67); color: rgb(241, 241, 236); text-decoration:solid; font-weight: bold;font-size: 30px;" >E&TC TE A Exam Forms</button>

    
    <button style="background-color:rgb(10, 112, 171); color: azure; float: right; vertical-align:middle" class="button " onclick="location.href='departments_update_status.html'"><span>BACK</span></button>

        
        <div class="container">
            <table border="1">
                <tr>
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>PRN</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>File</th>
                    <th>Status</th>
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
                        <td><a href="<?php echo $row['file']?>"><?php echo $row['file']?></a></td>
                        <td>
                            <?php
                            if($row['status']==1)
                            {
                             echo "Pending";
                            }
                            if($row['status']==2)
                            {
                             echo "Verified";
                            }
                            if($row['status']==3)
                            {
                             echo "Reject";
                            }
                             ?>
                        </td>
                        <td>
                            <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['id']?>')">
                                <option value="">Update Status</option>
                                <option value="1">Pending</option>
                                <option value="2">Verified</option>
                                <option value="3">Reject</option>
                            </select>
                        </td>


                        </tr>
                <?php }
                } ?>
            </table>
            </div>
            </div>
            <script type="text/javascript">
                function status_update(value,id){
                    //alert(id);
                    let url="http://localhost/Final_year/update_status_entc_te_a.php";
                    window.location.href=url+"?id="+id+"&status="+value;

                }
            </script>
    </body>
</html>