<?php
include "db.php";

$real = "SELECT * FROM insert_new";
$calm = mysqli_query ($db, $real);



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

   <div class="command">
    <table>
        <tr>
            <th>S/N</th>
            <th>Username</th>
            <th>Phone number</th>
            <th>password</th>
        </tr>
        <?php while($row = mysqli_fetch_array($calm)) { ?>
        <tr>
            <td><?php echo $row['id'] ; ?></td>
            <td><?php echo $row['user_name'] ; ?></td>
            <td><?php echo $row['phone_number'] ; ?></td>
            <td><?php echo $row['password'] ; ?></td>
        </tr>
        <?php } ?>
    </table>
    </div>
    
</body>
</html>