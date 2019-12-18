<?php
namespace Controller;
class User
{
    public $username;
    public $password;
    public $email;
    public $level;
    public function __construct($username,$password,$email,$level) 
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->level = $level;
    }
}