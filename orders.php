<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказы</title>
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
    form {
        width: 96%;
        margin: 2%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    div {
        width: 12%;
        display: flex;
        flex-direction: column;
    }
    .bold {
        text-align: center;
        font-weight: bold;
    }
    </style>
</head>
<body>
    <a href="index.php">Вернуться на главную страницу</a><br>
    <a href="latest.php">Показать 5 последних заказов</a>
    
     <h1>Заказы</h1>
     <form action="" method="post" name="filter">
         <p>Фильтры:</p>
         <div>
         <label for="city">Город:</label>
         <select name="city">
            <option selected value=0>Все</option>
            <option value="Москва">Москва</option>
            <option value="Санкт-Петербург">Санкт-Петербург</option>
            <option value="Екатеринбург">Екатеринбург</option>
         </select>
         </div>
         <div>
         <label for="area">Зона доставки:</label>
         <select name="area">
            <option selected value=0>Все</option>
            <option value="Зона 1">Зона 1</option>
            <option value="Зона 2">Зона 2</option>
            <option value="Зона 3">Зона 3</option>
         </select>
         </div>
         <div>
         <label for="type">Тип доставки:</label>
         <select name="type">
            <option selected value=0>Все</option>
            <option value="Курьер">Курьер</option>
            <option value="Самовывоз">Самовывоз</option>
         </select>
         </div>
         <div>
         <label for="status">Статус доставки:</label>
         <select name="status">
            <option selected value=0>Все</option>
            <option value="В обработке">В обработке</option>
            <option value="Принят">Принят</option>
            <option value="Доставлен">Доставлен</option>
            <option value="Ожидает оплаты">Ожидает оплаты</option>
            <option value="Отправлен">Отправлен</option>
            <option value="Ожидает отправки">Ожидает отправки</option>
         </select>
         </div>
         <div>
        <label for="ord_date">Дата заказа:</label>
        <input type="date" name="ord_date">
        </div>
        <div>
        <label for="del_date">Дата доставки:</label>
        <input type="date" name="del_date">
        </div>
        <input type="submit" name="submit" value="Найти">
     </form>
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
    $sql = 'SELECT *, `cust_address`.`id` AS `add_id`, `customer`.`id` AS `cust_id`, `delivery`.`id` AS `del_id`, `tb_order`.`date` AS `ord_date`, `delivery`.`date` AS `del_date`  FROM `cust_address` LEFT JOIN `customer` ON `customer`.`id`=`cust_address`.`cust_id` LEFT JOIN `tb_order` ON `tb_order`.`customer_id`=`customer`.`id` LEFT JOIN `delivery` ON `delivery`.`id`=`tb_order`.`delivery_id` WHERE ';
    function addWhere($where, $add, $and = true) {
        if ($where) {
            $where .= " AND $add";
        } else $where = $add;
    return $where;
  }
    $where = "";
    if (($_POST["city"])&&($_POST["city"] !== 0)) $where = addWhere($where, "`cust_address`.`city` = '".htmlspecialchars($_POST["city"]))."'";
    if (($_POST["area"])&&($_POST["area"] !== 0)) $where = addWhere($where, " `delivery`.`area` = '".htmlspecialchars($_POST["area"]))."'";
    if (($_POST["type"])&&($_POST["type"] !== 0)) $where = addWhere($where, "`delivery`.`type` = '".$_POST["type"]."'");
    if (($_POST["status"])&&($_POST["status"] !==0)) $where = addWhere($where, "`tb_order`.`status` = '".htmlspecialchars($_POST["status"]))."'";
    if ($_POST["ord_date"]) $where = addWhere($where, "`tb_order`.`date` = '".htmlspecialchars($_POST["ord_date"]))."'";
    if ($_POST["del_date"]) $where = addWhere($where, "`delivery`.`date` = '".htmlspecialchars($_POST["del_date"]))."'";
    
    if ($where) { $sql.= "$where";} else {$sql.=1;}
    
    $statement = $pdo->query($sql); 
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