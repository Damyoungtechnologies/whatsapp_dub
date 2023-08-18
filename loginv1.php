<?php

SESSION_START();

include 'db.php';

$error = "";

if(isset($_POST['login'])){


$user_name = mysqli_real_escape_string($db, $_POST['user_name']);
$email = mysqli_real_escape_string($db, $_POST['email']);


$result = "SELECT * FROM dlcf_register WHERE user_name = '$user_name' AND email = '$email'";
$reward = mysqli_query($db, $result);
$news = mysqli_fetch_array($reward);


if($news){

    $_SESSION['user_name'] = $news['id'];
    header('location: dashboardv1.php');

    
}else{

    $error = "Account does not exist on database";
}



}




?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Page</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/brands.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/brands.min.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/regular.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/regular.min.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/solid.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/solid.min.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/svg-with-js.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/svg-with-js.min.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/v4-font-face.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/v4-font-face.min.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/v4-shims.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/v5-font-face.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/v4-shims.min.css">
    <link rel="stylesheet" href="font-awesome-icons/fontawesome-free-6.1.1-web/css/v5-font-face.min.css">

</head>
<body>
    <?php if(!empty($error)){  ?>

        <div class="error">
            <?php echo"$error" ?>
        </div>
    <?php } ?>
    <div class="round">
    <div class="logo"><img src="images/DLCF-logo.png" alt="Church Logo"></div>
    </div>
    <div class="center">
        <h1>Log in Page</h1>
        <form action="" method="post">
        <label for="">User name</label>
        <input type="text" name="user_name" id="" required><br>
        <label for="">Email</label>
        <div class="stay">
        <input type="password" oninput="disappear()" name="email" id="email" required><br>
        <div class="showpassword">
         <span onclick="reveal_my_email()"><i class="fa fa-eye" aria-hidden="true" id="show"></i><i class="fa fa-eye-slash" aria-hidden="true" id="hide"></i></span>
        </div>
        </div>
        <input type="radio" class="forget-password" name="" id="f"><h3>Forget Password</h3>
        <button name="login">Log in</button>
        </form>
    </div>



        <Script>
            function reveal_my_email(){
                var a = document.getElementById("email");
                var b = document.getElementById("show");
                var c = document.getElementById("hide");
                if(a.type === "password"){
                    a.type = "text";
                    b.style.display = "none";
                    c.style.display = "block";
                }else{
                    a.type = "password";
                    b.style.display = "block";
                    c.style.display = "none";
                }
            }
            function disappear(){
                var a = document.getElementById("email");
                var b = document.getElementById("show");
                var c = document.getElementById("hide");
                var d = a.value;
                if(d.type === ""){
                    b.style.display = "none";
                    c.style.display = "none";
                }else{
                    b.style.display = "block";
                    c.style.display = "none";
                }
            }


        </Script>


</body>
</html>