<?php

require_once 'model/User.php';

class UserProvider 
{
    private PDO $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function authUser($login, $password): ?User
    {
        $statment = $this->pdo->prepare(
            'SELECT name, login, password FROM users WHERE login = ?'
        );
        $statment->execute([$login]);
        $userData = $statment->fetchObject(User::class, [$login]);

        if(!$userData){
            return null;
        }

        if(!password_verify($password, $userData->getPassword())){
            return null;
        }
        return $userData;
    }
}