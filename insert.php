<?php

include "db.php";

$error ="";

if(isset($_POST['submit'])){

    $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
    $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if(empty($user_name) && empty($phone_number) && empty($password)){
        $error = "Kindly fill all fields";
    }elseif(empty($user_name)){
        $error = "Fill the user name";
    }elseif(empty($phone_number)){
        $error = "Fill the phone number";
    }elseif(empty($password)){
        $error = "Fill the password";
    }else{
        $crude = "INSERT into insert_new (user_name, phone_number, password) VALUES ('$user_name', '$phone_number', '$password')";
        $result = mysqli_query ($db, $crude);
        if($result){
            $error = "Registration successful";
        }else{
            $error = "Registration failed";
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
    <title>Document</title>
    <link rel="stylesheet" href="style/insert.css">
</head>
<body>
    <div class="me">
        <div class="error"><?php if(!empty($error)) { echo $error ;} ?></div>
        
        <div class="insert">
            <div class="first">REGISTRATION FORM</div>
            <form action="" method="post">

            <div class="id">
                <label for="">U/N</label>
                <input type="text" name="user_name" id="" placeholder="Input your username">
            </div>

            <div class="id">
                <label for="">Tel</label>
                <input type="tel" name="phone_number" id="" placeholder="Input your phone number">
            </div>

            <div class="id">
                <label for="">PW</label>
                <input type="password" name="password" id="" placeholder="Input your password">
            </div>
            <button class="update" name="submit" type="submit">Register now!</button>
            </form>

        
        </div>
    </div>
</body>
</html>