<?php
require_once 'model/ToDo.php';
class ToDoProvider
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function addTask(ToDo $task): bool
    {
        $statment = $this->pdo->prepare(
            'INSERT INTO tasks (desc, author, isDone) VALUES (:desc, :author, :isDone)'
        );
        return $statment->execute([
            'desc' => $_POST['desc'],
            'author' => $_SESSION['login'],
            'isDone' => $_POST['isDone']
        ]);

    }

}