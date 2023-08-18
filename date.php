<?php
include "db.php";

$message ="";

$id ="";
$username ="";
$email ="";
$phonenumber ="";
$address ="";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $images = $_FILES['images']['name'];

    $location = 'images/'. $images;

    move_uploaded_file($_FILES['images']['tmp_name'], $location);

    if(empty($username) && empty($email) && empty($phonenumber) && empty(address) && empty($images)){
        $message = "Fill all the fields";
    }elseif(empty($username)){
        $message = "Fill the username";
    }elseif(empty($email)){
        $message = "Fill your email";
    }elseif(empty($phonenumber)){
        $message = "Fill your phone number";
    }elseif(empty($address)){
        $message = "Fill your address";
    }elseif(empty($images)){
        $message = "Attach your image";
    }

   else{
    $thyme = "INSERT INTO date (username, email, phone_number, address, images) VALUES ('$username', '$email', '$phonenumber', '$address', '$images')";
    $time = mysqli_query($db, $thyme); 
    if($time){
        $message = "Registration successful";
    }else{
        $message = "Registration failed";
    }
  } 
}
if(isset($_GET['update'])){

    $id = $_GET['update'];
    $never = "SELECT * FROM  date WHERE id = '$id'";
    $always = mysqli_query($db, $never);
    $anytime = mysqli_fetch_array($always);

    $id = $anytime['id'];
    $username = $anytime['username'];
    $email = $anytime['email'];
    $phonenumber = $anytime['phone_number'];
    $address = $anytime['address'];

}
if(isset($_POST['updatenow'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $images = $_FILES['images']['name'];

    $location = 'images/'. $images;

    move_uploaded_file($_FILES['images']['tmp_name'], $location);

    $manu = "UPDATE date SET username = '$username', email = '$email', phone_number = '$phonenumber', address = '$address', images = '$images' WHERE id ='$id'";
    $chelsea = mysqli_query($db, $manu);
    if($chelsea){
        $message = "Update successul";
    }else{
        $message = "Update failed";
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $realmadrid = "DELETE FROM date WHERE id = '$id'";
    $mancity = mysqli_query($db, $realmadrid);
    if($mancity){
        $message = "Delete successful";
    }else{
        $message = "Delete failed, please try again";
    }
}
 $maquire = "SELECT * FROM date";
 $lover = mysqli_query($db, $maquire);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/date.css">
</head>
<body>
    <table>
        <tr>
            <th>S/N</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Address</th>
            <th>Images</th>
            <th colspan ="2">Action</th>
        </tr>
        <?php while($damyoung = mysqli_fetch_array($lover)) { ?>
            <tr>
                <td><?php echo $damyoung['id'] ?></td>
                <td><?php echo $damyoung['username'] ?></td>
                <td><?php echo $damyoung['email'] ?></td>
                <td><?php echo $damyoung['phone_number'] ?></td>
                <td><?php echo $damyoung['address'] ?></td>
                <td><img src="images/<?php echo $damyoung['images'] ?>"  width="30px"></td>
                <td><a href="date.php?update=<?php echo $damyoung['id'] ?>">Update</a><a href="date.php?delete=<?php echo $damyoung['id'] ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
            <div class=""><img src="images/vestry.png" id="previewimage"  onclick ="selectfile()" alt="vestry image" width="150px" height=" 150px" ></div>
    <?php if(!empty($message)) echo $message ; ?>
    
    <form action="" method="post" enctype = "multipart/form-data">
        <input type="text" name="username" id="" placeholder="input your username" value="<?php echo $username ; ?>"><br><br>
        <input type="text" name="email" id="" placeholder="input your email" value="<?php echo $email ; ?>"><br><br>
        <input type="phone" name="phonenumber" id="" placeholder="input your phonenumber" value="<?php echo $phonenumber ; ?>"><br><br>
        <input type="text" name="address" id="" placeholder="input your address" value="<?php echo $address ; ?>"><br><br>
        <input type="file" name="images" id="imageshow"  onchange="loadimage(this)" ?><br><br>
        <button name="submit" type="submit">Submit</button>
        <button name="updatenow" type="update">Update</button>
    </form>


    <script>
        function selectfile(){
            document.querySelector('#imageshow').click();
        }
        function loadimage(e){
            if(e.files[0]){
                var filereader = new FileReader();

                filereader.onload = function(e){
                    document.querySelector('#previewimage').setAttribute('src', e.target.result );
                }
            }
                
            filereader.readAsDataURL(e.files[0]);
        }



    </script>


</body>
</htm












































































































































































