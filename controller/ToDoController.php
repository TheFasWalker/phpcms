<?php
session_start();
$title='ToDoListPage';
$titleH1 = 'ToDoListPage';
$userData = null;
$error = null;
if(isset($_SESSION['name'])){
    $userData = $_SESSION['name'];
}

include_once('views/toDoList.php');