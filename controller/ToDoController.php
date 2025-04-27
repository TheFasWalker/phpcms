<?php
session_start();
require_once('providers/ToDoProvider.php');
$pdo = require 'db.php';
$title='ToDoListPage';
$titleH1 = 'ToDoListPage';
$userData = null;
$error = null;
if(isset($_SESSION['name'])){
    $userData = $_SESSION['name'];
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

include_once('views/toDoList.php');