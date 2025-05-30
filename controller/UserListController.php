<?php
require_once('providers/UserProvider.php');
session_start();
$pdo = require 'db.php';
$title='UserListPage';
$titleH1 = 'UserListPage';
$error=null;
$userList = new UserProvider($pdo)->getAllUsers();
$userData = null;
if(isset($_SESSION['name'])){
    $userData = $_SESSION['name'];
    $userDataFromDB = new UserProvider($pdo)->getUserByLogin($_SESSION['login']);
}

if (isset($_POST['submit'])){
    if(isset($_POST['name'], $_POST['login'], $_POST['password'] )){
        $user = new User($_POST['name']);
        $user->setLogin($_POST['login']);
        $userProvider = new UserProvider($pdo);
        $userProvider->registerUser($user, $_POST['password']);
        header('Location: /?controller=userlist');
        exit;
    }else{
        $error = 'Некорректные данные';
    }
}


if (isset($_GET['delete'])){
    $userProvider = new UserProvider($pdo);
    if ($userProvider->deleteUserById($_GET['delete'])) {
        header('Location: /?controller=userlist');  // Убрал пробел после Location
        exit;
    } else {
        $error = 'Ошибка при удалении пользователя';
    }
}
include_once('views/userList.php');