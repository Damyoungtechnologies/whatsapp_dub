<?php
SESSION_START();
include "kilode.php";

$message = "";
$loginmessage = "";
if(isset($_POST['register'])){
    $name = $_POST['name'];
    if(empty($name)){
        $message = "Fill in your name";
    }
    else{
        $okay = "SELECT * FROM today WHERE names = '$name'";
        $man = mysqli_query($table, $okay);
        $nao = mysqli_fetch_array($man);
        if($nao){
            $message = "Name is already in database";
        }else{
            $mock = "INSERT INTO today (names) VALUES ('$name')";
            if($readme = mysqli_query($table, $mock)){
                $message = "Registration successful";
            }else{
                $message = "Registration failed";
            }
        }
    }
    
}
if(isset($_POST['login'])){
    $name = $_POST['name'];

    if(empty($name)){
        $loginmessage = "Fill in your name";
    }else{
        $youth = "SELECT * FROM today WHERE names = '$name'";
        $math = mysqli_query($table, $youth);
        $english = mysqli_fetch_array($math);
        if($english){
            
            $today_id = $english ['id'];
            $_SESSION ['today_id'] = $today_id;
            header('location: dashboard.php');
        
        }else{

            $loginmessage = "Register first before proceeding";
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
    <title>Register versus Login</title>
    <link rel="stylesheet" href="style/today.css">
</head>
<body>
    <div class="central">
        <?php if(!empty($message)){ ?>
            <div class="notify"><?php echo $message; ?></div>
        <?php } ?>
        <?php if(!empty($loginmessage)){ ?>
            <div class="notify"><?php echo $loginmessage; ?></div>
        <?php } ?>
        <div class="contain">
            <div class="register">
                <div class="top">
                    <h1>Register Here</h1>
                </div>
                <div class="additional">Fill in your detail</div>
                <form action="" method="post">
                <div class="name">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="type in your name" name="#" id="">
                </div>
                <div class="final"><input name="register" type="submit" value="Click to Register"></div>
                </form>
            </div>
            <div class="login">
                <div class="top">
                    <h1>Login Here</h1>
                </div>
                <div class="additional">Fill in your detail</div>
                <form action="" method="post">
                <div class="name">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Type in your name" name="#" id="">
                </div>
                <div class="final"><input name="login" type="submit" value="Click to Login"></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>