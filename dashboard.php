<?php

SESSION_START();

include "kilode.php";

$carr = "SELECT * FROM today WHERE id = $_SESSION ['today_id']";
$you = mysqli_query($table, $carr);
$okada = mysqli_fetch_array ($you);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLCF DASHBOARD</title>
    <link rel="shortcut icon" href="images/DLCF-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/dashboard.css">
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
<body onload="preload()">
    <div class="preload" id="preload"></div>
    <header class="dashboard">
        <div class="nav-bar">
            <div class="logo"><img src="images/DLCF-logo.png" alt="Church logo"></div>
            <div class="online"><div class="damyoung"><img src="images/damyoung_photo.jpg"></div> <h3><?php echo  $_SESSION['user_name']; ?> <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></h3>
            <div class="underonline">
                <div class="me"><span class="color"><?php echo  $_SESSION['user_name']; ?></span><br> online</div>
                <div class="next">
                    <ul>
                        <li><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i> Account Settings</a></li>
                        <li><a href=""><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
                        <li><a href=""><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a></li>
                    </ul>
                </div>
                <div class="last"><a href="">More info <span class="roll"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></span></div>
            </div>
            </div>
         </div>
        <div class="side-bar">
        <div class="menu">Menu</div>
        <div class="list">
            <ul>
                <li><a href="">Register</a></li>
                <li><a href="">Log in</a></li>
                <li><a href="">Forget Password</a></li>
            </ul>
        </div>
        </div>
        <div class="mainsection"></div>
        <div class="footer"></div>
    </header>


    <script>
        function preload(){
            var a = document.getElementById("preload");
            a.style.display = "none";
        }
    </script>


    <script src="js/dlcf.js"></script>
    <script>
       $(document).ready(function(){
        $('.online').click(function(){
        $('.underonline').toggleClass('active')
        
        })
       }) 


    </script>
</body>
</html>