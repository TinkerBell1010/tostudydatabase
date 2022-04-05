<?php 
if (intval($_COOKIE['rights'])===2) {
?>

<html lang="ru">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Заказчики</title>
    <style>
        html,body {
            width: 99%;
        }
        table {
            width:100%;
            border: 1px solid black;
            margin: 3% 0;
        }
        h1 {text-align: center;}
        tr:first-of-type {
            font-weight: bold;
        }
        td {
            border: 1px solid black;
            padding: 1%;
            width: 8%;
            word-wrap: break-word;
        }


    </style>
</head>
<body>
    <a href="index.php">Вернуться на главную страницу</a>
     <?php
     require_once('con.php');
     $statement = $pdo->query('SELECT * FROM `customer` WHERE 1'); 
     ?>

    <h1>Заказчики</h1>
    <a href="registration.php">Зарегистрировать нового заказчика</a>
    <table>
        <tr>
            <td>ID заказчика</td>
            <td>Логин</td>
            <td>Пароль</td>
            <td>E-mail</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Отчество</td>
            <td>Дата рождения</td>
            <td>Пол</td>
            <td>Телефон</td>
        </tr>
        <?php
        while($row = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['login'];?></td>
            <td><?php echo $row['password'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['surname'];?></td>
            <td><?php echo $row['middlename'];?></td>
            <td><?php echo $row['birth'];?></td>
            <td><?php echo $row['sex'];?></td>
            <td><?php echo $row['phone'];?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php } else {
    echo "<html><body><a href='index.php'>Вернуться на главную страницу</a><br>Для просмотра этой страницы нужны права администратора</body></html>";
}

?>