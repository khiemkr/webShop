<?php
$my_sqli = new mysqli("localhost","root","","demoweb");
//check connect
if($my_sqli->connect_errno){
    echo "fail connect: " . $my_sqli->connect_error;
    exit();
 }



?>