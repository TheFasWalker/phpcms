<?php
class User 
{
    private $name;
    private $login;


    public function __construct($name,){
        $this->name = $name;
      
    }

    public function getName():string{
        return $this->name;
    }
    public function setLogin(string $login):void{
        $this->login = $login;
    }
    public function getLogin():string{
        return $this->login;
    }

}