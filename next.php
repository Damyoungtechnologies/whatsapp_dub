<?php

include "db.php";

$mark = "SELECT * FROM dlcf_register";
$rate = mysqli_query($db, $mark);





?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Table</title>
    <link rel="stylesheet" href="style/classwork.css">
</head>
<body>

<table>
<tr>
    <th>S/N</th>
    <th>USERNAME</th>
    <th>FIRST STREET ADDRESS</th>
    <th>SECOND STREET ADDRESS</th>
    <th>PHONE NUMBER</th>
    <th>CITY</th>
    <th>POSTAL</th>
    <th>EMAIL</th>  
</tr>
<?php while($roll = mysqli_fetch_array($rate)){ ?>
<tr>
<td><?php echo $roll['id']  ?></td>
<td><?php echo $roll['user_name']  ?></td>
<td><?php echo $roll['street_address']  ?></td>
<td><?php echo $roll['street_address_line_2']  ?></td>
<td><?php echo $roll['phone_number']  ?></td>
<td><?php echo $roll['city']  ?></td>
<td><?php echo $roll['postal']  ?></td>
<td><?php echo $roll['email']  ?></td>
</tr>
<?php } ?>
</table>

<?php 
$forward = "SELECT * FROM dlcf_register";
$backward = mysqli_query($db, $forward);


?>

<div class="compress">
<?php while($calculus = mysqli_fetch_array($backward)) { 
    
    $email = $calculus['email'];
      
    $phone_number = $calculus['phone_number'];
      $city = $calculus['city'];
      $user_name = $calculus['user_name'];
    
    
    ?>   
<?php  $vex = "
    <div class=\"card\">
        <h3>$user_name</h3>
        <h3>$email</h3>
        <h3>$phone_number</h3>
        <h3>$city</h3>
    </div>
";
 
echo $vex;
?>

<?php } ?>
</div>


</body>
</html>