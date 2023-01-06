<?php
    include "./connectSQL.php";
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $username."!";
    $password = hash("sha512", $password);
    $query = 'INSERT INTO users VALUES("'.$username.'","'.$password.'","'.$role.'","'.$fullname.'","'.$email.'");';
    echo $query;
    if($con -> query($query)){
        header("Location: ../index.php?request=admin");
    } else header("Location: ../index.php?request=admin&error=query_failed");
?>