<?php
require_once('providers/UserProvider.php');
$pdo = require 'db.php';
$title='authPage';
$titleH1 = 'Autorization';
$userData = null;
session_start();
$error=null;
$userDataFromDB = null;

if(isset($_SESSION['name'])){
    $userData = $_SESSION['name'];
    $userDataFromDB = new UserProvider($pdo)->getUserByLogin($_SESSION['login']);
}


if (isset($_POST['submit'])){
    if(isset($_POST['login'],$_POST['password'])){
        $user = new UserProvider($pdo)->authUser($_POST['login'], $_POST['password']);
        if($user) {
            $_SESSION['name'] = $user->getName();
            $_SESSION['login'] = $user->getLogin();
        }else{
            $error ='Auth error';
        }
    }
}

include_once('views/auth.php');