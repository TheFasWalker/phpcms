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
    public function getTasksByAuthor(string $author): array
    {
        $statment= $this->pdo->prepare(
            'SELECT id, desc, isDone FROM tasks WHERE author = ?'
        );
        $statment->execute([$author]);
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllTasks():array{
        $statment= $this->pdo->prepare(
            'SELECT id, desc, isDone FROM tasks WHERE author = ?'
        );
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteTaskById(int $id): bool{
        try{
            $statment= $this->pdo->prepare(
                'DELETE FROM tasks WHERE id = ?'
        );
        $statment->execute([$id]);
        return $statment->rowCount() > 0;
        }catch (PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            return false;
        }

    }
}