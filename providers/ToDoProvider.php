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
        $statment = $this->pdo->prepare(
            'SELECT id, desc, isDone FROM tasks WHERE author = ?'
        );
        $statment->execute([$author]);
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllTasks(): array
    {
        $statment = $this->pdo->prepare(
            'SELECT id, desc, isDone FROM tasks WHERE author = ?'
        );
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteTaskById(int $id): bool
    {
        try {
            $statment = $this->pdo->prepare(
                'DELETE FROM tasks WHERE id = ?'
            );
            $statment->execute([$id]);
            return $statment->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            return false;
        }

    }
    // public function toggleToDo(int $id): bool
    // {
    //     try {
    //         $statment = $this->pdo->prepare(
    //             'SELECT isDone FROM tasks WHERE id = ?'
    //         );
    //         $statment->execute([$id]);
            
    //         $currentStatment = $statment->fetchColumn();
            
    //         if ($currentStatment == false) {
    //             return false;
    //         }

    //         $newState = $currentStatment ? 0 : 1;
    //         $updateStatement = $this->pdo->prepare(
    //             'UPDATE tasks SET isDone = ? WHERE id = ?'
    //         );
    //         $updateStatement->execute([$newState, $id]);
    //         return $updateStatement->rowCount() > 0;
    //     } catch (PDOException $e) {
    //         error_log("Error toggling task status: " . $e->getMessage());
    //         return false;
    //     }
    // }
    public function toggleToDo(int $id): bool
    {
        try {
            // Используем один запрос для переключения состояния
            $statement = $this->pdo->prepare(
                'UPDATE tasks SET isDone = CASE WHEN isDone = 1 THEN 0 ELSE 1 END WHERE id = ?'
            );
            $statement->execute([$id]);
            
            return $statement->rowCount() > 0;
            
        } catch (PDOException $e) {
            error_log("Error toggling task status: " . $e->getMessage());
            return false;
        }
    }
}