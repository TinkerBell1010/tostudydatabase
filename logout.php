<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выход</title>
    <style>
        html,body {
            width: 99%;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        form {
            margin-top: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center
        }
        input {
            width: 30%;
        }
    </style>
</head>
<body>
    <a href="index.php">Вернуться на главную страницу сайта<a>
    <form action="" method="post">
        <p>Вы действительно хотите выйти?</p>
        <input type="submit" name="submit" value="Да">
    </form>
<?php
if ($_POST) {
    setcookie("id", "", time() - 3600*24*30*12, "/");
    setcookie("rights", "", time() - 3600*24*30*12, "/");
    header("Location: index.php");
    exit;
}
?>
</body>
</html>