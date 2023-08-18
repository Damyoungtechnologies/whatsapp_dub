<?php
SESSION_START();
include ("wap.php");

require_once '../vendor/autoload.php';

$message = "";
if(isset($_POST['register'])){
    
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
    $code = mysqli_real_escape_string($db, $_POST['code']);
    $phone = '+'.$code.$phonenumber;
    $verificationcode = "123456789";
    $verificationcode_token_1 = str_shuffle($verificationcode);
    $verificationcode_token_2 = substr($verificationcode_token_1, 0, 6);

    
    $message= 'Use this code:'.$verificationcode_token_2.' to log into Sammys website';
    
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

    



    if(empty($country) && empty($phone)){
        $message = "Kindly complete your registration";
    }elseif(empty($country)){
        $message = "Select your country of origin";
    }elseif(empty($phonenumber)){
        $message = "Kindly add your phone number";
    }elseif(empty($code)){
        $message = "Kindly add your country code";
    }else{


        $marie = "SELECT * FROM registration WHERE phone = '$phone'";
        $purie = mysqli_query($db, $marie);
        $panter = mysqli_fetch_array($purie);
        if($panter){

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


            $milk = "UPDATE registration SET verification_number = '$verificationcode_token_2' WHERE phone ='$phone'";
            $choco = mysqli_query($db, $milk);
            if($choco){

                $_SESSION['phone'] = $phone;
                header('location: chat_site(verification_page).php');
                
            }
        }else{
            $message = "Retry again!";
        }

           
        }else{


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
 
 
            $caption = "INSERT INTO registration (country, phone, verification_number) VALUES ('$country', '$phone', '$verificationcode_token_2')";
            $manny = mysqli_query($db, $caption);
            if($manny){

                $_SESSION['phone'] = $phone;
                header('location: chat_site(verification_page).php');
           
            }else{
                $message = "Registration failed";
            }
             
         }else{
             $message = "Retry again!";
         }
         
            
        }
       
    }
  
}


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="../style/chat_site.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/brands.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/brands.min.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/regular.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/regular.min.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/solid.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/solid.min.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/svg-with-js.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/svg-with-js.min.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/v4-font-face.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/v4-font-face.min.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/v4-shims.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/v5-font-face.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/v4-shims.min.css">
    <link rel="stylesheet" href="../font-awesome-icons/fontawesome-free-6.1.1-web/css/v5-font-face.min.css">
</head>
<body>
    <section class="next2">
        <div class="main2">
            <div class="container">
                <div class="top1">
                <h4>Verify your phone number</h4>
                <div class="icon"><a href="#"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a></div>
                </div>
                <div class="next1">WhatsApp will send an SMS message to verify your phone
                    number. Enter your country code and phone number:
                </div>
                <form action="" method="post">
                <div class="next3">
                    <select class="select1" name="country" id="">
                        <option value="">Add your country</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Burkinafaso">Burkinafaso</option>
                        <option value="Congo">Congo</option>
                        <option value="America">America</option>
                        <option value="England">England</option>
                        <option value="China">China</option>
                        <option value="South Korea">South Korea</option>
                        <option value="Norway">Norway</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Norge">Norge</option>
    
                    </select>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </div>
                <div class="next4">
                 <input type="number" placeholder="code" name="code" id="" min="1" max="500"> <input type="tel" name="phonenumber" id="" placeholder="phone number">
                </div>

                <?php if(!empty($message)){ echo $message; } ?>
                <div class="next">
                    <button name="register" class="nextie">NEXT</button>
                    <small>Carrier SMS charges may apply</small>
                </div>
            </form>
               
                
            </div>

        </div>
    </section>
</body>
</html>