<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>
<?php
require 'connect.php';
if(isset($_POST["id"])){
    $sql = "DELETE FROM user WHERE id = :userid";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":userid", $_POST["id"]);
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Ошибка при удалении пользователя.";
    }
    
 
}
?>