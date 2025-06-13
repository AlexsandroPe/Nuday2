<?php 

class User {
    private $name;
    private $email;
    private $telephone;

    public function __construct($name, $email, $telephone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getTel()
    {
        return $this->telephone;
    }

    
}