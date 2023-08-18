<?php
SESSION_START();

include "new.php";
$error = "";
$errorlogin = "";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($username) && empty($email) && empty($password)){
        $error = "Complete the form";
    }elseif(empty($username)){
        $error = "Fill your username field";
    }elseif(empty($email)){
        $error = "Fill your email field";
    }elseif(empty($password)){
        $error = "Fill your password field";
    }
    else{
        $malachi = "SELECT * FROM classwork WHERE email = '$email'";
        $house = mysqli_query($classwork, $malachi);
        $young = mysqli_fetch_array($house);
        if($young){
            $error = "Email is already in database";
        }else{
            $new = "INSERT INTO classwork (username, email, password) VALUES ('$username', '$email', '$password')";
            if($result = mysqli_query($classwork, $new)){
            $error = "Registration completed!";
            }else{
            $error = "Registration failed";
            }
        }
    }
        
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $me = "SELECT * FROM classwork WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($classwork, $me);
    $data = mysqli_fetch_array($result);

    if($data){
        $_SESSION['username'] = $username;
        header('location: logout.php');
    }else{
        $errorlogin = "Kindly register!";
    }

}





?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My classwork</title>
    <link rel="stylesheet" href="style/classwork.css">
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
    <div class="me">
        <div class="contact">
            <div class="register">
                <div class="top">
                    <h1>Registration form</h1>
                    <caption>Kindly register here</caption>
                </div>
                <?php if(!empty($error)){  ?>
                <div class="error"><?php echo $error ?> </div>
                <?php } ?>
                <div class="inner">
                    <form action="" method="post">
                    <div class="user">
                        <label for="">Username</label>
                        <input type="text" name="username"  Placeholder=" input your username" id="">
                    </div>
                    <div class="Email">
                        <label for="">Email</label>
                        <input type="text" name="email"  Placeholder=" input your Email" id="">
                    </div>
                    <div class="password">
                        <label for="">Password</label>
                        <div class="showpassword">
                        <input type="password" name="password" oninput="connector()" Placeholder=" input your Password" id="mypassword">
                        <span class="icons" onclick="let_me_see_password()"><i class="fa fa-eye" aria-hidden="true" id="show"></i><i class="fa fa-eye-slash" aria-hidden="true" id="hide"></i></span>
                        </div>
                    </div>
                    <input class="log" name="register" type="submit" value="Register now">
                    </form>
                </div>
            </div>
            <div class="login">
                <div class="top">
                    <h1>Login Form</h1>
                    <caption>Kindly login here</caption>
                </div>
                <?php if(!empty($errorlogin)){  ?>
                <div class="error"><?php echo $errorlogin; ?> </div>
                <?php } ?>
                <div class="inner">
                    <form action="" method="post">
                    <div class="user">
                        <label for="">Email</label>
                        <input type="email" name="email"  Placeholder=" input your email" id="" required>
                    </div>
                    <div class="password">
                        <label for="">Password</label>
                        <div class="showpassword">
                        <input type="password" oninput="hide()" name="password"  Placeholder=" input your Password" id="mypassword2" required>
                        <span class="icons" onclick="reveal()"><i class="fa fa-eye" aria-hidden="true" id="put-up"></i><i class="fa fa-eye-slash" aria-hidden="true" id="put-away"></i></span>
                        </div>  
                    </div>
                    <input class="log" name="login"  type="submit" value="Login now">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function let_me_see_password(){
            var a = document.getElementById("mypassword");
            var b = document.getElementById("show");
            var c = document.getElementById("hide");
            if(a.type === 'password'){
                a.type = 'text';
                b.style.display = 'none';
                c.style.display = 'block';
            }else{
                a.type = 'password';
                b.style.display = 'block';
                c.style.display = 'none';
            }
        }
        function connector(){
            var a = document.getElementById("mypassword");
            var b = document.getElementById("show");
            var c = document.getElementById("hide");
            var d = a.value;
            if ( d.type === ""){
                b.style.display = 'none';
                c.style.display = 'none';
            }else{
                b.style.display = 'block';
                c.style.display = 'none';
            }
        }
        function reveal(){
            var a = document.getElementById("mypassword2");
            var b = document.getElementById("put-up");
            var c = document.getElementById("put-away");
            if( a.type === 'password'){
                a.type = 'text';
                b.style.display = 'none';
                c.style.display = 'block';
            }else{
                a.type = 'password';
                b.style.display = 'block';
                c.style.display = 'none';
            }
        }
        function hide(){
            var a = document.getElementById("mypassword2");
            var b = document.getElementById("put-up");
            var c = document.getElementById("put-away")
            var d = a.value;
            if(d.type === ""){
                b.style.display = 'none';
                c.style.display = 'none';
            }else{
                b.style.display = 'block';
                c.style.display = 'none';
            }
        }
    </script>

</body>
</html>