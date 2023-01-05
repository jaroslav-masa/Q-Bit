<?php
    session_start();
    include('functions/connectSQL.asd8SW84fS');
    $username = isset($_POST['username']) ? $_POST['username'] : '';  
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);
    $password = hash('sha512',$password);
    echo $password;
    $sql = "select * from users where username = '$username' and password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    if ($count == 1) {
        $role = array_slice($row, 2, 1);
        $role = implode(',',$role);
        $_SESSION["loggedIn"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $role;
        header("Location: index.php?request=welcome");
        exit;
    } else {
        $_SESSION["loggedIn"] = null;
        header("Location: index.php?request=login&failed=true");
    }

?>  