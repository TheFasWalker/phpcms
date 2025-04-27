<?php
require_once 'model/ToDo.php';
class ToDoProvider 
{
    private PDO $pdo;
    public function __construct(PDO $pdo){
        $this->pdo= $pdo;
    }
    
}