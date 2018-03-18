<?php
//Connect to Database

$db_host = 'taramobilecrechespune.org';
$db_name = 'httptara_employee';
$db_user = 'httptara_ngouser';
$db_pass = 'ngouser';
//$con = mysqli_connect("taramobilecrechespune.org", "httptara_ngouser", "ngouser", "httptara_employee");
//Create mysqli Object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);


//Error Handler
if (mysqli_connect_errno()){
    echo "This connection Failed".mysqli_connect_error();
    die();
}

