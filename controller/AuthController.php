<?php
require_once('providers/UserProvider.php');
$pdo = require 'db.php';
$title='authPage';
$titleH1 = 'Autorization';


session_start();
$error=null;


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