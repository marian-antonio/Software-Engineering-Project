<?php

$dbServer = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cpms";

$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);


//if connection fails
if(!$conn){
    die("Could not connect to database." . mysqli_connect_error());
}
else{
    $mysqli = $conn;
}