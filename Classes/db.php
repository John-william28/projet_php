<?php
//Configuration de la base de données
$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mariaDB:host=$host;dbname=$db; charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try{
    $pdo = new PDO ($dsn, $user, $pass, $options);
}catch (\PDOException $e){
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}



?>