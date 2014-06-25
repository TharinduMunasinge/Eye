<?php



    $email = "rshariffdeen@gmail.com" ;
    $subject ="test" ;
    $message = "test" ;
    mail($email, "Subject: $subject",$message, "From:no-reply@yesl.com" );
    echo("send");

?>