<?php 
$pdo = require 'db.php';

 $pdo->exec('CREATE TABLE `users` (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(100) NOT NULL,
    login VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
 )');
