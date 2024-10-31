<?php

$dsn = "mysql:host=localhost;port=3306;dbname=cars;charset=utf8mb4";
$pdo = new PDO($dsn, 'root', '123456');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
