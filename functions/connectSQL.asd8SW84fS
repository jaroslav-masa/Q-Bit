<?php
$serverName = "localhost";
$username = "root";
$password = "mysql";
$database = "data";

$con = new mysqli($serverName, $username, $password, $database);

$isFailed = $con -> connect_error;

if($isFailed){
    die("Connection error: " . $con->connect_error);
}

?>