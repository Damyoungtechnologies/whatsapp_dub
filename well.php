<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>submitformajax</title>
</head>
<body>  
    <br>
    <input type="text" name="" id="" placeholder="Enter a text">

 <br><br>

 <div class="error" id="errormessage"></div>
 <br>


 <form action="" method="post">
 <input type="text" name="username" id="username" placeholder="Enter your username"><br>
 <input type="text" name="phone" id="phone" placeholder="Enter your phone"><br>
 <input type="text" name="email" id="email" placeholder="Enter your email"><br>
 <input type="text" name="password" id="password" placeholder="Enter your password"><br>
<br><br>
 <input type="button" id="registerwell" value="REGISTER">


 </form>

<script src="ajaxjquerynew.js"></script>
<script>
    $(document).ready(function(){

    var username = document.getElementById('username');
    var phone = document.getElementById('phone');
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var button = document.getElementById('registerwell');

    button.addEventListener('click', submitform);

    function submitform(){
     
      
        var username1 = username.value;
    
        var phone1 = phone.value;
        
        var email1 = email.value;
       
        var password1 = password.value;
       


        $.ajax({
            url: "formsubmitaction.php",
            method: "post",
            data: { username1: username1, phone1: phone1, email1: email1, password1: password1 },
            success: function(data){
                $("#errormessage").html(data);
            }


        })

    }

    })
    
</script>

</body>
</html>