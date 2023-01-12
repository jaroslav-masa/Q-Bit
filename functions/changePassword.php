<?php
    session_start();
    include_once('connectSQL.php');
    if (!isset($_SESSION["username"])) {
        header("Location: ../index.php?request=login");
    };
    $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
    $newPasswordTwo = isset($_POST['newPasswordTwo']) ? $_POST['newPasswordTwo'] : '';
    $newPassword = hash('sha512', $newPassword);
    $newPasswordTwo = hash('sha512', $newPasswordTwo);

    if ($newPassword != $newPasswordTwo) {
        header("Location: ../index.php?request=changePassword");
        exit;
    }

    $query = 'UPDATE users SET password = "'.$newPassword.'", firstTimeUser = 0 WHERE username = "'.$_SESSION["username"].'";';
    
    $stmt = $con->prepare('UPDATE users SET password = :password, firstTimeUser = 0 WHERE :username = ?;');
    $stmt->bindParam(":username", $_SESSION["username"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $newPassword, PDO::PARAM_STR);
    if ($stmt->execute()) {
        header("Location: ../index.php?request=dashboard");
    } echo "Query Error";
