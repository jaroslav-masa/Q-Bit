<?php
    ini_set( 'session.cookie_httponly', 1 );
    ini_set( 'session.cookie_secure', 1 );
    session_start();

    // SESSION TIMEOUT (5 MINUTES)

    /*if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60*5)) {
        session_unset();
        session_destroy();
    }
    $_SESSION['LAST_ACTIVITY'] = time();*/
    require 'functions/connectSQL.asd8SW84fS';
    require "assets/header.phtml";

    session_regenerate_id();
    if(!empty($_GET["request"]))
        switch($_GET["request"]){
            case "login":
                if (isset($_SESSION["username"]))
                    include $_SERVER["REQUEST_URI"];
                else 
                    include "./assets/layout.phtml";    
                break;

            case "welcome":
                if (isset($_SESSION["username"]))
                    include "./assets/welcome.phtml";
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
                    include "./assets/layout.phtml";   
                break;

            case "about":

                break;

            case "admin":

                break;
        }
    else header("Location: index.php?request=home");

    require "assets/footer.html";
?>