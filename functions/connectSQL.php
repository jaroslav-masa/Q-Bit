<?php
$username = "root";
$password = "mysql";
try {
    $con = new PDO('mysql:host=localhost;dbname=data', $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}