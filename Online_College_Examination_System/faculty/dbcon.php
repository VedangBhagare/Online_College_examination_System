<?php
define("HOSTNAME","localhost");  //this are four constants and their values
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","be_proj");

$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);  /*to establish connection with database. 
                                                                        this 4 will do connection and store 
                                                                      it in $connection variable*/
if(!$connection){
    die("Connection failed");
}



?> 

