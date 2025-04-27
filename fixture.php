<?php 
$pdo = require 'db.php';
require_once 'providers/UserProvider.php';
require_once 'model/User.php';

 $pdo->exec('CREATE TABLE IF NOT EXISTS `users` (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(100) NOT NULL,
    login VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
 )');
 $pdo->exec(
   'CREATE TABLE IF NOT EXISTS `tasks` (
   id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
   desc VARCHAR(100) NOT NULL,
   isDone BOOLEAN ,
   author VARCHAR(100) NOT NULL)');


$user =new User('first User');
$user->setLogin('admin');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');