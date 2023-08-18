<?php
SESSION_START();

include "new.php";





?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/logout.css">
</head>
<body>
    <div class="bold">
    <h2> Welcome <?php echo  $_SESSION['username']; ?></h2>
    <a href="classwork.php" class="logout">Logout</a>
    </div>
    
</body>
</html>