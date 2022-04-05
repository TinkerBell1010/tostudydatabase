<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<style>
    html,body {width: 98%;}
    body {
        display: flex;
        justify-content: center;
    }
    form {
        width: 30%;
        display: flex;
        flex-wrap: wrap;
        margin-top: 5%;
        justify-content: center;
        align-items: center;
    }
    h1 {
        width: 100%;
        text-align: center;
        font-size: 50px;
    }
    label {
        width: 100%;
        font-size: 20px;
    }
    input {
        width: 100%;
        margin: 3% 0;
        padding: 4%;
    }
    button {
        width: 30%;
        padding: 1%;
        margin: 3%;
    }
</style>
<body>
    <a href="index.php">Вернуться на главную страницу</a>
     <?php
     require_once('con.php');

     ?>
    <form action="" method="POST">
        <h1>Авторизация</h1>
    <label for="login">Логин:</label>
    <input type="text" name="login" placeholder="введите логин">
    <label for="password">Пароль:</label>
    <input type="password" name="password" placeholder="введите пароль">
    <button type="submit" name="submit">Войти</button>
</form>
<?php 
if ($_POST) {
    if (($_POST['login']==="admin")&&($_POST['password']==="iamadmin")) {
        session_start();
        setcookie("rights", "2", time()+60*60*24*30, "/");
        header("location:index.php");
    } else {
        $query = $pdo->prepare("SELECT * FROM `customer` WHERE `login`=?");
        $query->execute([$_POST['login']]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if ($row['password']===$_POST['password']) {
            session_start();
            setcookie("id", $row['id'], time()+60*60*24*30, "/");
            setcookie("rights", "1", time()+60*60*24*30, "/");
            header("location:my_office.php");
            
        } else {
            echo "Вы ввели неверные пароль или логин";
        }
    }
}
?>

</body>
</html>