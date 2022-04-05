<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);
    $host = 'localhost'; 
    $db   = 'succes13ru'; 
    $user = 'succes13ru'; 
    $pass = 'Ineedyou6213'; 
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);

?>