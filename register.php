<?php

include "db.php";

$errormessage ="";

if(isset($_POST["register"])){

$first_name = mysqli_real_escape_string($db,$_POST["first_name"]);
$last_name = mysqli_real_escape_string($db,$_POST["last_name"]);
$user_name = $first_name.$last_name;
$street_address = mysqli_real_escape_string($db,$_POST["street_address"]);
$street_address_line_2 = mysqli_real_escape_string($db,$_POST["street_address_line_2"]);
$phone_number = mysqli_real_escape_string($db,$_POST["phone_number"]);
$city = mysqli_real_escape_string($db,$_POST["city"]);
$postal = mysqli_real_escape_string($db,$_POST["postal"]);
$email = mysqli_real_escape_string($db,$_POST["email"]);
$additional_info = mysqli_real_escape_string($db,$_POST["additional_info"]);

if(empty($first_name) && empty($last_name) && empty($street_address) && empty($street_address_line_2) && empty($house_number) && empty($city) && empty($postal) && empty($email) && empty($additional_info)){
    $errormessage = "Kindly fill the field below";
}elseif(empty($first_name)){
    $errormessage = "Fill in your first name";
}elseif(empty($last_name)){
    $errormessage = "Fill in your last name";
}elseif(empty($street_address)){
    $errormessage = "Fill in your street address";
}elseif(empty($street_address_line_2)){
    $errormessage = "Fill in your street address line 2";
}elseif(empty($phone_number)){
    $errormessage = "Fill in your Phone number";
}elseif(empty($city)){
    $errormessage = "Fill in your city";
}elseif(empty($postal)){
    $errormessage = "Fill in your postal";
}elseif(empty($email)){
    $errormessage = "Fill in your email";
}elseif(empty($additional_info)){
    $errormessage = "Fill in your additional infor";
}

else{
    $data = "INSERT INTO dlcf_register ( user_name, street_address, street_address_line_2, phone_number, city, postal, email, additional_info) VALUES ('$user_name', '$street_address', '$street_address_line_2', '$phone_number', '$city', '$postal', '$email', '$additional_info')";
    if($result = mysqli_query($db, $data)){
        $errormessage = "Registration Successful";
        header('location:login.php');
    }else{
        $errormessage = "Registration failed";
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
    <title>DLCF Register</title>
    <link rel="shortcut icon" href="images/DLCF-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <div class="main">
        <div class="wrapper">
            <div class="top">
                <div class="logo"><img src="images/DLCF-logo.png"></div>
                <div class="name">
                    <h3>Presider's Circle Registration</h3>
                    <h4>Deeper lIfe Campus Fellowship®</h4>
                </div>
            </div>
            <form action="" method="post">
            <?php if(!empty($errormessage)){  ?>
                <div class="errormessage"><?php echo"$errormessage"; ?></div>
            <?php } ?>
            <div class="middle1">
                <label for="#">Name of Delegate <span class="red">*</span></label>
                <div class="one">
                    <input type="text" name="first_name" id="#">                    
                    <input type="text" name="last_name" id="#">
                    <h5>First Name</h5>
                    <h5>Last Name</h5>
                </div>
            </div>
            <div class="middle2">
                <label for="#">Address <span class="red">*</span></label>
                <div class="bind">
                        <div class="before">
                            <input class="good" type="text" name="street_address" id="#">                    
                            <h5>Street Address</h5>  
                            <input class="good" type="text" name="street_address_line_2" id="#">
                            <h5>Street Address Line 2</h5>
                        </div>
                        <div class="one">
                            <input type="phone" name="phone_number" id="#"> 
                            <input type="text" name="city" id="#">
                            <h5>Phone Number</h5>
                            <h5>City</h5>
                            <input type="text" name="postal" id="#">                    
                            <select name="" id="state">
                                <option value="">Please Select</option>
                                <option value="">Abia State</option>
                                <option value="">Adamawa State</option>
                                <option value="">Akwa Ibom State</option>
                                <option value="">Anambra State</option>
                                <option value="">Bauchi State</option>
                                <option value="">Bayelsa State</option>
                                <option value="">Benue State</option>
                                <option value="">Borno State</option>
                                <option value="">Cross River State</option>
                                <option value="">Delta State</option>
                                <option value="">Ebonyi State</option>
                                <option value="">Edo State</option>
                                <option value="">Ekiti State</option>
                                <option value="">Enugu State</option>
                                <option value="">Gombe State</option>
                                <option value="">Imo State</option>
                                <option value="">Jigawa State</option>
                                <option value="">Kaduna State</option>
                                <option value="">Kano State</option>
                                <option value="">Katsina State</option>
                                <option value="">Kebbi State</option>
                                <option value="">Kogi State</option>
                                <option value="">Kwara State</option>
                                <option value="">Lagos State</option>
                                <option value="">Nasarawa State</option>
                                <option value="">Niger State</option>
                                <option value="">Ogun State</option>
                                <option value="">Ondo State</option>
                                <option value="">Osun State</option>
                                <option value="">Oyo State</option>
                                <option value="">Plateau State</option>
                                <option value="">River State</option>
                                <option value="">Sokoto State</option>
                                <option value="">Taraba State</option>
                                <option value="">Yobe State</option>
                                <option value="">Zamfara State</option>
                            </select>
                            <h5>Postal/Zip</h5>
                            <h5>State</h5>
                        </div>
                </div>
          
            </div>
            <div class="third">
                <label for="#">Email <span class="red">*</span></label>
                <div class="two">
                    <input type="text" name="email" id="#" placeholder="enter your email">
                </div>
            </div>
            <div class="third">
                <label for="#" class="final">Additional info <span class="red">*</span></label>
                <div class="two">
                    <input type="text" name="additional_info" id="#" placeholder="input any other additional information">
                </div>
            </div>
            <div class="submit"><input type="submit" name="register" value="Register Now!"></div>
            </form>
        </div>
    </div>
</body>
</html>