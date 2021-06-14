<?php

//Parameters to connect to database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "todo";

//Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$conn){
    die("Database connection failed!");
}


?>