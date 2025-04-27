<?php
require_once('providers/UserProvider.php');

$pdo = require 'db.php';
$title='UserListPage';
$titleH1 = 'UserListPage';

$userList = new UserProvider($pdo)->getAllUsers();

include_once('views/userList.php');