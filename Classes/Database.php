<?php
class Database{
    private $host = 'localhost';
    private $db = 'bibliothèque';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    public $pdo;


    public function __construct(){
        $dsn = "mariaDB:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    try{
        $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
    }
    catch(\PDOException $e){
        //throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
        }
    }