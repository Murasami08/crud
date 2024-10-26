<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Изменить можно всё кроме пароля</h1>
</body>
</html>
<?php
require 'connect.php';
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = $_GET["id"];
    $sql = "SELECT * FROM user WHERE id = :userid";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":userid", $userid);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach ($stmt as $row) {
            $username = $row["username"];
            $email = $row["email"];
        }
        echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' id='id' value='$userid' />
                    <p>Логин:
                    <input type='text' name='username' id='username' value='$username' /></p>
                    <p>Эл.Почта:
                    <input type='email' name='email' id='email'  value='$email' /></p>
                    <input type='submit' value='Сохранить' />
            </form>";
    }
    else{
        echo "Пользователь не найден";
    }
}
elseif (isset($_POST["id"]) && isset($_POST["username"]) && isset($_POST["email"])) {
      
    $sql = "UPDATE user SET username = :username, email = :email WHERE id = :userid";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":userid", $_POST["id"]);
    $stmt->bindValue(":username", $_POST["username"]);
    $stmt->bindValue(":email", $_POST["email"]);
          
    $stmt->execute();
    header("Location: index.php");
}
else{
    echo "Некорректные данные";
}
?>