<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Стартовая страница сайта</title>
    <style>
        html,body {width: 100%;}
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        ul {
            width: 100%;
            display: flex;
            flex-direction: row;
            list-style-type: none;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid black;
            margin: 0;
            padding: 1% 0;
            flex-wrap: wrap;
        }
        li{
            width: 14%;
            padding: 0.5% 0;
            display: flex;
            justify-content: center;
        }

        li:not(:last-of-type){
            border-right: 1px solid black;
        }
        a{align-self: center}
        p {
            text-align: center;
            margin-top: 10%;
            font-size: 30px;
            
        }
        
    </style>
</head>
<body>
    <ul>
        <li><a href="customers.php">Заказчики</a></li>
        <li><a href="employees.php">Сотрудники</a></li>
        <li><a href="orders.php">Заказы</a></span>
        <li><a href="registration.php">Регистрация</a></li>
        <li><a href="my_office.php">Личный кабинет</a></li>
        <li><a href="login.php">Войти</a></li>
        <li><a href="logout.php">Выйти</a></li>
    </ul>
    <p>Здравствуйте!<br>Рады приветствовать Вас на нашем сайте</p>
    

</body>
</html>