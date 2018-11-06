<?php

{
	
	header('Location: contact');
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['comments'];

$_SESSION['testVar'] = $_POST['name'];

if(empty($name)||empty($visitor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = $name;
$email_subject = "Wind's Gate Inquiry";
$email_body = "You have received a new message from the user $name.\n".
    "\n Here is the message:\n\n $message\n\n".
    	
$to = "johnnypaid12@gmail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);

header('Location: thanks.php');


function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 