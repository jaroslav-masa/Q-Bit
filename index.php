<?php
    if (empty($_SERVER["HTTPS"]) || $_SERVER["SERVER_PORT"] != 443){
        header('Location: https://'.$_SERVER["HTTP_HOST"]);
    }
    ini_set('session.cookie_httponly', 1 );
    ini_set('session.cookie_secure', 1 );
    session_start();
    session_regenerate_id();

    $homeLocation = "Location: index.php?request=home";
    $loginLocation = "Location: index.php?request=login";

    $year = "2023";
    $month = "01";
    $day = "12";
    $hour = "14";
    $majorVersion = "0";
    $minorVersion = "0";
    $release = "7";
    $version = "x"; //beta = b ;; release = nothing ;; pre-alpha = x ;; alpha = a
    $_SESSION["appVersion"] = $majorVersion.".".$minorVersion.".".$release.$version;
    $_SESSION["appBuild"] = "0x".substr($year, -2).$month.$day.$hour;
    //SESSION TIMEOUT (5 MINUTES)

    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60*5)) {
        session_unset();
        session_destroy();
    }
    $_SESSION['LAST_ACTIVITY'] = time();

    require_once 'functions/connectSQL.php';
    require_once "assets/header.phtml";

    
    ?>
    <div class="flex-1">
    <?php
    if (!empty($_GET["request"])) {
        switch ($_GET["request"]) {
            case "login":
                if (isset($_SESSION["username"])) {
                    header("Location: index.php?request=dashboard");
                } else {
                    include_once "./assets/layout.phtml";
                }
                break;

            case "home":
                include_once "./assets/home.phtml";
                break;

            case "dashboard":
                if (isset($_SESSION["username"])) {
                    include_once "./assets/dashboard.phtml";
                } else {
                    header($loginLocation);
                }
                break;

            case "changelog":
                include_once "./assets/changelog.phtml";
                break;

            case "admin":
                if (isset($_SESSION["username"]) && isset($_SESSION["role"])) {
                    if ($_SESSION["role"] == "admin") {
                        include_once "./assets/admin.phtml";
                    } else {
                        header($homeLocation);
                    }
                } else {
                    header($loginLocation);
                }
                break;

            case "changePassword":
                if (isset($_SESSION["username"])) {
                    include_once "./assets/changePassword.phtml";
                } else {
                    header($loginLocation);
                }
                break;
            default:
                header($homeLocation);
                break;
        }
    } else {
        header($homeLocation);
    }
    ?>
    </div>
   
    <?
    require_once "assets/footer.html";
?>
