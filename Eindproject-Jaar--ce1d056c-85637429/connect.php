<?php

// $host = '127.0.0.1:3306';
// $db   = 'jarvis-chat';
// $user = 'jarvis-chat';
// $pass = 'YOUG3bon-kah6trut';
// $charset = 'utf8mb4';
// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $pdo = newPDO($dsn, $user, $pass);

$host = 'localhost';
$db = 'jarvis-chat';
$user = 'jarvis-chat';
$password = 'YOUG3bon-kah6trut';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $password);
?>