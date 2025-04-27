<?php

require_once 'model/User.php';

class UserProvider
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function authUser($login, $password): ?User
    {
        $statment = $this->pdo->prepare(
            'SELECT name, login, password FROM users WHERE login = ?'
        );
        $statment->execute([$login]);
        $userData = $statment->fetchObject(User::class, [$login]);

        if (!$userData) {
            return null;
        }

        if (!password_verify($password, $userData->getPassword())) {
            return null;
        }
        return $userData;
    }
    public function registerUser(User $user, string $password): bool
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $statment = $this->pdo->prepare(
            'INSERT INTO users (name, login, password) VALUES (:name, :login, :password)'
        );
        return $statment->execute([
            'name' => $user->getName(),
            'login' => $user->getLogin(),
            'password' => $hashedPassword
        ]);
    }
    public function getAllUsers(): array
    {
        $statment = $this->pdo->prepare(
            'SELECT id, name, login FROM users'
        );
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }
}