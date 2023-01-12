<?php
    session_start();
    include_once('connectSQL.php');
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $password = hash('sha512', $password);
    $stmt = $con->prepare("SELECT * FROM users WHERE username = :username AND password = :password;");
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count == 1) {
        $_SESSION["firstTimeUser"] = $row["firstTimeUser"];
        $_SESSION["loggedIn"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $row["role"];
        if($_SESSION["firstTimeUser"]){
            header("Location: ../index.php?request=changePassword");
    } else {
        header("Location: ../index.php?request=dashboard");
        exit;
    }
    } else {
        $_SESSION["loggedIn"] = null;
        header("Location: ../index.php?request=login&failed=true");
    }
