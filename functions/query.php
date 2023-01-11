<?php
    include_once "./connectSQL.php";
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $username."!";
    $password = hash("sha512", $password);
    $firstTimeUser = isset($_POST["firstTimeUser"]) ? 1 : 0;

    $stmt = $con->prepare("INSERT INTO users (username, password, role, fullname, email, firstTimeUser) VALUES (?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE username = ?, role = ?, email = ?, fullname = ?");
    $stmt->bind_param("sssssissss",$username, $password, $role, $fullname, $email, $firstTimeUser, $username, $role, $email, $fullname);

    if (!$stmt->execute()) {
        header("Location: ../index.php?request=admin&error");
    } else {
        header("Location: ../index.php?request=admin");
    }