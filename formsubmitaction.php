<?php
include 'db.php';

$message ="";


if(isset($_POST['username1'])){

$username = $_POST['username1'];
$phone = $_POST['phone1'];
$email = $_POST['email1'];
$password = $_POST['password1'];



if(empty($username) && empty($phone) && empty($email) && empty($password)){
    $message = "All field is required";
}elseif(empty($username)){
    $message = "Enter username";
}elseif(empty($phone)){
    $message = "Enter phone";
}elseif(empty($email)){
    $message = "Enter email";
}elseif(empty($password)){
    $message = "Enter password";
}else{
    $dare = "INSERT INTO datenow (username, email, phone, password) VALUES('$username', '$email', '$phone', '$password')";
    $dare2 = mysqli_query($db, $dare);

    if($dare2){
        $message = "Registration successful";
    }else{
        $message = "Registration failed";
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
</head>
<body>

<?php
if(!empty($message)){
    echo $message ;
}
?>

<input type="hidden" id="successmessage" name="" value="<?php echo $message ; ?>">

<script>

var success = document.getElementById("successmessage").value;

if(success == "Registration successful"){
    var username = document.getElementById("username");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var phone = document.getElementById("phone");

    username.value = "";
    email.value = "";
    password.value = "";
    phone.value = "";

}


</script>
</body>
</html>