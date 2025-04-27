<?php
require_once('providers/UserProvider.php');

$pdo = require 'db.php';
$title='UserListPage';
$titleH1 = 'UserListPage';
$error=null;
$userList = new UserProvider($pdo)->getAllUsers();
if (isset($_POST['submit'])){
    if(isset($_POST['name'], $_POST['login'], $_POST['password'] )){
        $user = new User($_POST['name']);
        $user->setLogin($_POST['login']);
        $userProvider = new UserProvider($pdo);
        $userProvider->registerUser($user, $_POST['password']);
        header('Location: /?refresh='.time());
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