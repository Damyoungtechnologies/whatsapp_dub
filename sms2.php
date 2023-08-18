<?php

require_once 'vendor/autoload.php';

if(isset($_POST['sendSMS'])){


$phone ="+2348032077924";

$beans = "123456789";
$bole =str_shuffle($beans);
$ukpaka = substr($bole,0,6);

$message= 'Use this code:'.$ukpaka.' to log into Sammys website';

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md


$sid = "AC0aaadac8658eaa08172145df86729c43";
$token = "d2a74f047ea0dc08dd70714efdfb0486";

$client = new Twilio\Rest\Client($sid, $token);

$message = $client->messages->create(

    $phone, array(
        'from' => '+16283458913',
        'body' => $message
    )

    );

    if($message->sid){

        echo 'sent successfully';

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  


   

   <form action="" method="post">

   <button name ="sendSMS">SEND klulMESSAGE</button>

   </form>

</body>
</html>