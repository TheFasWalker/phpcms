<?php
class User 
{
    private $name;
    private $login;
    private $password;

    public function __construct($name, $password = ''){
        $this->name = $name;
        $this->password = $password;
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
    public function getPassword(): string
    {
        return $this->password;
    }
}