<?php
    $version = "0.1a";

    $errorIcon = "<i class='fa-solid fa-triangle-exclamation'></i>";
    $errorClass = "p-2.5 text-center font-medium text-sm text-red-200 relative items-center bg-red-500 rounded-lg border-2 border-red-800 col-span-3 w-full shadow-glow-sm shadow-red-800";
    $warningClass = "p-2.5 text-center font-medium text-sm text-orange-200 relative items-center bg-orange-500 rounded-lg border-2 border-orange-800 col-span-3 w-full shadow-glow-sm shadow-orange-800";
    function httpWarning($icon, $class){
        
        $message = "You will not be able to login.";
        
        $element = "<p class=\"".$class."\">".$icon."&nbsp".$message."</p>";
    
    
        if (empty($_SERVER["HTTPS"]) || $_SERVER["SERVER_PORT"] != 443)
        print($element);
    }

    function addElements($role){
        $element = "<li></li>";
    }

    function failedLogin($icon, $class, $failed){
        $message = "Wrong login credentials!";
        $element = "<p class=\"".$class."\">".$icon."&nbsp".$message."</p>";
        if ($failed == true)
            print $element;
    }
?>