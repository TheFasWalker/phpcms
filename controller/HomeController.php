<?php
session_start();
$title='HomePage';
$titleH1 = 'HomePage';
if(isset($_SESSION['name'])){
    $userData = $_SESSION['name'];
}

include_once('views/home.php');