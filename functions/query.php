<?php
    include "./connectSQL.php";
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $username."!";
    $password = hash("sha512", $password);
if (isset($_POST["firstTimeUser"]))
    $firstTimeUser = 1;
else
    $firstTimeUser = 0;
    if(!mysqli_query($con,'INSERT INTO users VALUES("'.$username.'","'.$password.'","'.$role.'","'.$fullname.'","'.$email.'", "'.$firstTimeUser.'") ON DUPLICATE KEY UPDATE username = "'.$username.'", role = "'.$role.'", email = "'.$email.'", fullname = "'.$fullname.'";')){
        echo mysqli_error($con);
    } else header("Location: ../index.php?request=admin");

    /*if($con -> query($query)){
        header("Location: ../index.php?request=admin");
} else
    mysqli_error($con); //header("Location: ../index.php?request=admin&error=query_failed");*/
?>