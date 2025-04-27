<?php

class ToDo
{
    private $isDone;
    private $desc;
    private $author;

    public function __construct( $desc, $author, $isDone =false){
        $this->isDone = $isDone;
        $this->desc = $desc;
        $this->author = $author;
    }
    public function toggleComplete():void{
        $this->isDone = !$this->isDone;
    }
    public function getAuthor(): string{
        return $this->author;
    }
    public function getState(): bool{
        return $this->isDone;
    }
}