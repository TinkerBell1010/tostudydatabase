<?php 
if (intval($_COOKIE['rights'])===2) {
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сотрудники</title>
    <style>
        html,body {
            width: 99%;
        }
        table {
            width:100%;
            border: 1px solid black;
        }
        h1 {text-align: center;}
        tr:first-of-type {
            font-weight: bold;
        }
        td {
            width: 9%;
            border: 1px solid black;
            padding: 1%;
        }
        img { 
            max-width: 100px;
            max-height: 50px;
        }
        a {
            width: 100%;
            display: flex;
            justify-content: center;
        }

    </style>
</head>
<body>
    <a href="index.php">Вернуться на главную страницу</a>
    <?php
     require_once('con.php');
     $statement = $pdo->query('SELECT * FROM `employee` WHERE 1'); 
     ?>
    <table>
        <h1>Сотрудники</h1>
        <tr>
            <td>ID сотрудника</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Отчество</td>
            <td>Должность</td>
            <td>Телефон</td>
            <td>Дата рождения</td>
            <td>Город</td>
            <td>Адрес</td>
            <td>Изменить данные</td>
            <td>Удалить данные</td>
        </tr>
        <?php
        while($row = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>   
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['surname'];?></td>
            <td><?php echo $row['middlename'];?></td>
            <td><?php echo $row['position'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['birth'];?></td>
            <td><?php echo $row['city'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><a href="edit.php?edit_id=<?php echo $row['id']?>"><img src="https://static-images.talentegg.ca/Public%20Outreach/APPLICATION.png" alt="Изменить"></a></td>
            <td><a href="delete.php?del_id=<?php echo $row['id']?>"><img src="https://img.flaticon.com/icons/png/512/216/216658.png?size=1200x630f&pad=10,10,10,10&ext=png&bg=FFFFFFFF" alt="Удалить"></a></td>
        </tr>
        <?php } ?>
       
    </table>
</body>
</html>
<?php } else {
    echo "<html><body><a href='index.php'>Вернуться на главную страницу</a><br>Для просмотра этой страницы нужны права администратора</body></html>";
}

?>