<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Регистрация</title>
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
    <form action="" method="post">
        <h1>Регистрация</h1>
        <label for="login">Логин:</label>
        <input type="text" name="login" id="login" placeholder="Введите логин" required maxlength="20">
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" placeholder="**********" required maxlength="20">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="example@gmail.com" required maxlength="50">
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" placeholder="Введите ваше имя" required maxlength="15">
        <label for="surname">Фамилия:</label>
        <input type="text" name="surname" id="surname" placeholder="Введите вашу фамилию" required maxlength="30">
        <label for="middle_name">Отчество:</label>
        <input type="text" name="middle_name" id="middle_name" placeholder="Введите ваше отчество" required maxlength="20">
        <label for="date_of_birth">Дата рождения:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" required>
        <label for="sex">Пол:</label>
        <p><input type="radio" name="sex" id="sex" checked value="1">Мужской</p>
        <p><input type="radio" name="sex" id="sex" value="0">Женский</p>
        <label for="tel">Телефон:</label>
        <input type="tel" name="tel" id="tel" placeholder="+7 (999)-99-99" required maxlength="20">
        <input type="submit" value="Зарегистрироваться" id="submit">
    </form>
    <?php
    require_once('con.php');
    if ($_POST) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $middle_name = $_POST["middle_name"];
    $birth = $_POST["date_of_birth"];
    $sex = $_POST["sex"];
    $tel = $_POST["tel"];

    $stm = $pdo->prepare("INSERT INTO `customer` SET `id` = :id, `login` = :login, `password` = :password, `email` = :email, `name` = :name, `surname` = :surname, `middlename` = :middlename, `birth` = :birth, `sex` = :sex, `phone` = :tel");
    $stm->execute(array('id' => null, 'login' => $login, 'password' => $password, 'email' => $email, 'name' => $name, 'surname' => $surname, 'middlename' => $middle_name, 'birth' => $birth, 'sex' => $sex, 'tel' => $tel));
header("Location: customers.php");
        
    }
    ?>

</body>
</html>