<?php
session_start();
require_once('providers/ToDoProvider.php');
$pdo = require 'db.php';
$title='ToDoListPage';
$titleH1 = 'ToDoListPage';
$userData = null;
$error = null;
$tasksList = null;
if(isset($_SESSION['name'])){
    $userData = $_SESSION['name'];
}
if(isset($_SESSION['login'])){
    $tasksList = new ToDoProvider($pdo)->getTasksByAuthor($_SESSION['login']);
}else{
    $tasksList = new ToDoProvider($pdo)->getAllTasks();
}

if(isset($_POST['submit'])){
    if(isset($_POST['desc'])){
        $task = new ToDo ($_POST['desc'], $_SESSION['login']); 
    
        if(isset($_POST['isDone'])){
            $task->toggleComplete() ;
        }
        $toDoProvider = new ToDoProvider($pdo);
        $toDoProvider->addTask($task);
        header('Location: /?controller=todolist');
        exit;
    }else{
        $error = 'Something wrong';
    }
    
}
if(isset($_GET['deleteTask'])){
    $toDoProvider = new ToDoProvider($pdo);
    if($toDoProvider->deleteTaskById($_GET['deleteTask'])){
        header('Location: /?controller=todolist');
    }
}
include_once('views/toDoList.php');