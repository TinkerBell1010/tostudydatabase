<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5 последних заказов</title>
    <style>
    html,body{width: 98%;}
    body {
    }
    h1{text-align: center}
    table {
        width:96%;
        margin: 2%;
        border: 1px solid black;
    }
    td {
        width: 9%;
        padding: 1%;
        border: 1px solid black;
    }

    .bold {
        text-align: center;
        font-weight: bold;
    }
    </style>
</head>
<body>
    <a href="index.php">Вернуться на главную страницу</a>
    <h1>5 последних оформленных заказов</h1>
    <table>
         <tr class="bold">
             <td>№заказа</td>
             <td>Дата заказа</td>
             <td>Статус заказа</td>
             <td>Способ оплаты</td>
             <td>ФИО заказчика</td>
             <td>Дата доставки</td>
             <td>Тип доставки</td>
             <td>Зона доставки</td>
             <td>Город</td>
             <td>Адрес</td>
         </tr>
        <?php 
        require_once('con.php');
        $statement = $pdo->query('SELECT *, `cust_address`.`id` AS `add_id`, `customer`.`id` AS `cust_id`, `delivery`.`id` AS `del_id`, `tb_order`.`date` AS `ord_date`, `delivery`.`date` AS `del_date`  FROM `cust_address` LEFT JOIN `customer` ON `customer`.`id`=`cust_address`.`cust_id` LEFT JOIN `tb_order` ON `tb_order`.`customer_id`=`customer`.`id` LEFT JOIN `delivery` ON `delivery`.`id`=`tb_order`.`delivery_id` ORDER BY `tb_order`.`date` DESC LIMIT 5');
         while($row = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['ord_date'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['payment'];?></td>
            <td><?php echo $row['surname']." ".$row['name']." ".$row['middlename'];?></td>
            <td><?php echo $row['del_date'];?></td>
            <td><?php echo $row['type'];?></td>
            <td><?php echo $row['area'];?></td>
            <td><?php echo $row['city'];?></td>
            <td><?php echo $row['street']." д.".$row['house']." кв.".$row['flat']." этаж ".$row['floor'];?></td>
        </tr>
        <?php } ?>
        </table>
</body>
</html>