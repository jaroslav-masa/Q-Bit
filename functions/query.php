<?php
    include_once "./connectSQL.php";
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $username."!";
    $password = hash("sha512", $password);
    $firstTimeUser = isset($_POST["firstTimeUser"]) ? 1 : 0;

    $stmt = $con->prepare("INSERT INTO users (username, password, role, fullname, email, firstTimeUser)
                            VALUES (:username, :password, :role, :fullname, :email, :firstTimeUser) 
                            ON DUPLICATE KEY UPDATE username = :username, role = :role, email = :email, fullname = :fullname");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':firstTimeUser', $firstTimeUser, PDO::PARAM_INT);

    if (!$stmt->execute()) {
        header("Location: ../index.php?request=admin&error");
    } else {
        header("Location: ../index.php?request=admin");
    }