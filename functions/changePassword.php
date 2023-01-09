<?php
    session_start();
    include('connectSQL.php');
    if(!isset($_SESSION["username"])) header("Location: ../index.php?request=login");
    $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';  
    $newPasswordTwo = isset($_POST['newPasswordTwo']) ? $_POST['newPasswordTwo'] : '';

    $newPassword = stripcslashes($newPassword);
    $newPasswordTwo = stripcslashes($newPasswordTwo);
    $newPassword = mysqli_real_escape_string($con, $newPassword);
    $newPasswordTwo = mysqli_real_escape_string($con, $newPasswordTwo);
    $newPassword = hash('sha512',$newPassword);
    $newPasswordTwo = hash('sha512', $newPasswordTwo);

    if ($newPassword != $newPasswordTwo) {
        header("Location: ../index.php?request=changePassword");
        exit;
    }

    $query = 'UPDATE users SET password = "'.$newPassword.'", firstTimeUser = 0 WHERE username = "'.$_SESSION["username"].'";';
    
    if($con -> query($query)){
        mysqli_close($con);
        header("Location: ../index.php?request=dashboard");
    } else echo "Query failed";
    mysqli_close($con);
?>  