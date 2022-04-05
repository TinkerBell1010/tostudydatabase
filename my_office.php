<?php 
if (intval($_COOKIE['rights'])===1) {
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <style>
        html,body {
            width: 99%;
        }
        body {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            align-items: flex-start;
        }
        a {
            width: 100%;
        }
        ul {
            width: 40%;
            list-style-type: none;
        }
        li {
            font-size: 20px;
            line-height: 40px;
        }
        table {
            width: 50%;
            border: 1px solid black;
            margin-top: 3%;
        }
        td {
            border: 1px solid black;
            padding: 1%;
        }
        caption {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 2%;
        }
    </style>
</head>
<body>
    <a href="index.php">Вернуться на главную страницу</a>
    <?php
     require_once('con.php');
     $id = intval($_COOKIE['id']);
    $query = $pdo->prepare("SELECT * FROM `customer` WHERE `id`=?");
    $query->execute([$id]);
     $row = $query->fetch(PDO::FETCH_ASSOC)
     ?>
    <ul>
        <h1>Личная информация</h1>
        <li>Логин: <?php echo $row['login']?></li>
        <li>Пароль: <?php echo $row['password']?></li>
        <li>email: <?php echo $row['email']?></li>
        <li>ФИО: <?php echo $row['surname']." ".$row['name']." ".$row['middlename']?></li>
        <li>Дата рождения: <?php echo $row['birth']?></li>
        <li>Пол: <?php 
        if ($row['sex']==0) {
            echo "женский";
        } else { echo "мужской";}
        ?></li>
        <li>Телефон: <?php echo $row['phone']?></li>
    </ul>
    <table>
    <caption>Мои заказы</caption>
    <tr>
        <td><strong>Дата оформления</strong></td>
        <td><strong>Статус заказа</strong></td>
        <td><strong>Способ оплаты</strong></td>
        <td><strong>Дата доставки</strong></td>
        <td><strong>Тип доставки</strong></td>
    </tr>
    <?php $query = $pdo->prepare("SELECT *, `delivery`.`id`, `delivery`.`type`, `delivery`.`date` AS del_date FROM `tb_order` LEFT JOIN `delivery` ON `tb_order`.`delivery_id`=`delivery`.`id` WHERE `customer_id`=?");
    $query->execute([$id]);
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['status'];?></td>
        <td><?php echo $row['payment'];?></td>
        <td><?php echo $row['del_date'];?></td>
        <td><?php echo $row['type'];?></td>
    </tr>
    <?php } ?>
    </table>

</body>
</html>
<?php } else {
    echo "<html><body><a href='index.php'>Вернуться на главную страницу</a><br>Для просмотра этой страницы нужны права заказчика</body></html>";
}

?>