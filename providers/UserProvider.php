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
        $userData = $statment->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            return null;
        }

        if (!password_verify($password, $userData['password'])) {
            return null;
        }
        $UserFromBD = new User($userData['name']);
        $UserFromBD->setLogin($userData['login']);
        return $UserFromBD;
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
    public function deleteUserById(int $id): bool
{
    try {
        $statement = $this->pdo->prepare(
            'DELETE FROM users WHERE id = :id'
        );
        
        $result = $statement->execute(['id' => $id]);
        return $statement->rowCount() > 0;
    } catch (PDOException $e) {
        error_log("Error deleting user: " . $e->getMessage());
        return false;
    }
}
}