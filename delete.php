<?php

include "db.php";

$error ="";

if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($db, $_POST['id']);
   
    
   if(empty($id)){
            $error = "Fill the id";
   }else{
        $crude = "DELETE FROM insert_new WHERE id = '$id'";
        $result = mysqli_query ($db, $crude);
        if($result){
            $error = "Delete successful";
        }else{
            $error = "Delete failed";
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
            <div class="first">DELETE FORM</div>
            <form action="" method="post">
            <div class="id">
                <label for="">ID</label>
                <input type="text" name="id" id="" placeholder="Id">
            </div>

            <button class="update" name="submit" type="submit">Delete now!</button>
            </form>

        
        </div>
    </div>
</body>
</html>