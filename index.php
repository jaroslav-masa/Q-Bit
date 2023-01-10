<?php
    ini_set( 'session.cookie_httponly', 1 );
    ini_set( 'session.cookie_secure', 1 );
    session_start();
    $_SESSION["appVersion"] = "0.1.7a";
    session_regenerate_id();
    // SESSION TIMEOUT (5 MINUTES)

    /*if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60*5)) {
        session_unset();
        session_destroy();
    }
    $_SESSION['LAST_ACTIVITY'] = time();*/
    require 'functions/connectSQL.php';
    require "assets/header.phtml";

    
    ?>
    <div class="flex-1">
    <?php
    if (!empty($_GET["request"]))
        switch ($_GET["request"]) {
            case "login":
                if (isset($_SESSION["username"]))
                    header("Location: index.php?request=dashboard");
                else
                    include "./assets/layout.phtml";
                break;

            case "home":
                include "./assets/home.phtml";
                break;

            case "dashboard":
                if (isset($_SESSION["username"]))
                    include "./assets/dashboard.phtml";
                else
                    header("Location: index.php?request=login");
                break;

            case "changelog":
                include "./assets/changelog.phtml";
                break;

            case "admin":
                if (isset($_SESSION["username"]) && isset($_SESSION["role"]))
                    if ($_SESSION["role"] == "admin")
                        include "./assets/admin.phtml";
                    else
                        header("Location: index.php?request=home");
                else
                    header("Location: index.php?request=login");
                break;

            case "changePassword":
                if (isset($_SESSION["username"]))
                    include "./assets/changePassword.phtml";
                else
                    header("Location: index.php?request=login");
                break;
            default:
                header("Location: index.php?request=home");
                break;
        }
    else
        header("Location: index.php?request=home"); 
    ?>
    </div>
    <?
    require "assets/footer.html";
?>