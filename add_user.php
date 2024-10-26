<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add_user.php" method="post">
        <input type="text" name="username" placeholder="username" id="username" require>
        <input type="email" name="email" placeholder="email" id="email" require>
        <input type="password" name="password" placeholder="password" id="password" require>
        <input type="submit" value="Добавить">
    </form>
</body>
</html>
<?php
require 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
     $pass = md5($password);
    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$pass')";
    try{
        $db->query($sql);
        echo "User added successfully";
        echo '<a href="index.php">Back</a>';
    }
     catch(PDOException $e){
        echo $sql. "<br>". $e->getMessage();
    }
}
?>