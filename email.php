<?php
function spamcheck($field)
  {
 
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);


  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }


function send($email,$subject,$message){
if (isset($email))
  {
  $mailcheck = spamcheck($email);
  if ($mailcheck==FALSE)
    {
    return "Invalid input";
    }
  else
    {
   
    mail($email, "Subject: $subject",$message, "From:no-reply@yesl.com" );
    return  "sent";
    }
  }
}
?>
