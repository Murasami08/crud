<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
    require 'connect.php';
    $sql = "SELECT * FROM user";
    $data = $db->query($sql);
    $user_array = $data->fetchAll();
    ?>
    <h1>Таблица пользователей</h1>
    <a href="add_user.php" class="add">Добавить пользователя</a>
    <table class="table_blur">
            <tr>
            <th>№</th>
            <th>Логин</th>
            <th>Эл.Почта</th>
            <th>Пароль</th>
            </tr>
        <?php foreach($user_array as $user):?>
                <tr>
                    <td><?php echo $user['id']?></td>
                    <td><?php echo $user['username']?></td>
                    <td><?php echo $user['email']?></td>
                    <td><?php echo $user['password']?></td>
                    <td><a href="update_user.php?id=<?php echo $user['id']?>">Изменить</a></td>
                    <td>
                        <form action="delete_user.php" method="post">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <input type="submit" value="удалить">
                    </form>
                    </td> 
                </tr>
        <?php endforeach;?>
    </table>
</body>
</html>