<?php
require_once 'Database.php';

class User{
    private $pdo;

    public function __construct(){
        $db = new Database();
       // var_dump($db);
        $this->pdo = $db->pdo;
    }

    public function register($username, $password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
       // var_dump($this->pdo);
     //   $stmt = $this->pdo->prepare('INSERT INTO users (username, password) VALUES
     //   (:username, :password)');

       // return $stmt->execute(['username' => $username, 'password' => $hashed_password]);
    }

    public function login($username, $password){
     //   $stmt =$this->pdo->prepare("SELECT * FROM users WHERE username = :username");
     //   $stmt->execute(['username' => $username]);
       // $user = $stmt->fetch();

      //  if($user && password_verify($password, $user['password']) ){
           // return $user;
        }
      //  return false;
    }
//}