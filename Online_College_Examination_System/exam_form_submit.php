<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Exam Form Submission</title>
        <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css”>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="upload_exam_form.css">

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
      <button class="button" style="background-color:rgb(62, 5, 67); color: rgb(241, 241, 236); text-decoration:solid; font-weight: bold;font-size: 30px;" >Exam Form Status</button>
      <button style="background-color:rgb(10, 112, 171); color: azure; float: right; vertical-align:middle" class="button " onclick="location.href='stud_home_page.html'"><span>BACK</span></button>
      <div class="center">
        <h1>Upload exam Form</h1>
      <form method="post" enctype="multipart/form-data" action="exam_form.php">
        <div class="form-input py-2">
            <div class="form-group">
            <label>Enter your name</label>
              <input type="text"   class="form-control" name="name"
                     required>
                     
            </div>
            <div class="form-group">
            <label>Enter Email Id </label>
                <input type="mail" pattern= "[a-z0-9._%+-]+@ges-coengg\.org$"  title="please enter official mail" class="form-control" name="mail"
                       required>
                      
              </div>   
            
                <!-- <input type="text" class="form-control" name="class" -->
                        <!-- required> -->
                        <div class="form-group">
                          <label>Select your Class</label>
                       <select  name="class" class="form-control">
                        <option>Select Class</option>
                        <option>FE</option>
                        <option>SE</option>
                        <option>TE</option>
                        <option>BE</option>
                        <option>MCA</option>
                      </select>

              </div>

              <div class="form-group">
           <!-- <input type="text" class="form-control" name="divi" required> -->
                       <label>Enter your Division </label>

                       <select  name="divi" class="form-control">
                        <option>Select Division</option>
                        <option>A</option>
                        <option>B</option>
                      </select>
              </div>  


              <div class="form-group">
                <!-- <input type="text" class="form-control" name="dept" -->
                        <!-- required> -->
                       <label>Enter your Department</label>

                       <select  name="dept" class="form-control">
                        <option>Select Department</option>
                        <option>COMPUTER</option>
                        <option>CIVIL</option>
                        <option>MECHANICAL</option>
                        <option>E&TC</option>
                        <option>ELECTRICAL</option>
                        <option>MCA</option>
                        <option>ME</option>
                      </select>
              </div>  
              
              
              <div class="form-group">
              <label>Enter your PRN</label>
                <input type="text" class="form-control"  pattern= "[0-9]{8}[A-Z]{1}"  title="please enter valid PRN"name="prn"
                        required>
                       
              </div>   
              
              <label>Upload Exam Form</label>
            <div class="txt_field">
            
                <input type="file" name="file"
                class="form-control" accept=".pdf"
                title="Upload PDF"/>
            </div>
            <div class="txt_field">
              
              <input type="submit" class="btnRegister"
                     name="submit" value="Submit">
            </div>
       </div>
      </form>
      
    </div>
    </div>
    </body>
</html>

