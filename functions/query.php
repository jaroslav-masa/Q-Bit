<?php
    include "./connectSQL.php";
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $username."!";
    $password = hash("sha512", $password);
    if (empty($username)) { header("Location: ../index.php?request=admin&error=query_failed"); }
    $query = 'INSERT INTO users VALUES("'.$username.'","'.$password.'","'.$role.'","'.$fullname.'","'.$email.'") ON DUPLICATE KEY UPDATE username = "'.$username.'", role = "'.$role.'", email = "'.$email.'", fullname = "'.$fullname.'";';
    if($con -> query($query)){
        header("Location: ../index.php?request=admin");
    } else header("Location: ../index.php?request=admin&error=query_failed");
?>