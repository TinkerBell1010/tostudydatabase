<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Удаление данных о сотруднике</title>
    <style>
        html, body {
            width: 99%;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        form {
            width: 40%;
            display: flex;
            flex-direction: row;
            justify-content:center;
            flex-wrap: wrap;
            align-items:center;
        }
        label {
            width: 15%;
        }
        input {
            width: 80%;
            padding: 1%;
            margin-top: 2%;
        }
        p {
            min-width: 40%;
            display: flex;
        }
        #sex {
            width: 10%;
        }
        h1 {
            width: 100%;
            text-align:center;
        }
        #submit {
            width: 30%;
        }
    </style>
</head>
<body>
    <a href="index.php">Вернуться на главную страницу</a>
    <?php
    require_once('con.php'); 
    if (isset($_GET['del_id'])) {
     $statement = $pdo->query("SELECT * FROM `employee` WHERE `id`=".$_GET['del_id']);
   while($row = $statement->fetch(PDO::FETCH_ASSOC)) { 
    ?>
    <form action="" method="post">
        <a href="employees.php">Вернуться к таблице сотрудников</a>
        <h1>Удаление данных о сотруднике</h1>
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']?>" required maxlength="15">
        <label for="surname">Фамилия:</label>
        <input type="text" name="surname" id="surname" value="<?php echo $row['surname']?>" required maxlength="30">
        <label for="middle_name">Отчество:</label>
        <input type="text" name="middle_name" id="middle_name" required maxlength="20" value="<?php echo $row['middlename']?>">
        <label for="date_of_birth">Дата рождения:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" required value="<?php echo $row['birth']?>">
        <label for="sex">Должность:</label>
        <input type="text" name="position" id="position" required maxlength="20" value="<?php echo $row['position']?>">
        <label for="tel">Телефон:</label>
        <input type="tel" name="tel" id="tel" required maxlength="20" value="<?php echo $row['phone']?>">
        <label for="city">Город:</label>
        <input type="text" name="city" id="city" maxlength="20" value="<?php echo $row['city']?>">
        <label for="address">Адрес:</label>
        <input type="text" name="address" id="address" maxlength="100" value="<?php echo $row['address']?>">
        <input type="submit" value="Удалить" id="submit">
    </form>
    <?php
   }}
    if($_POST) {
        $statement = $pdo->query("DELETE FROM `employee` WHERE `id` = ".$_GET['del_id']);
        header("Location: employees.php");  
    }
    ?>
</body>
</html>