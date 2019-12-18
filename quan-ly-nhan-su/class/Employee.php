<?php
namespace Controller;

class Employee
{
    public $img;
    public $name;
    public $birthday;
    public $address;
    public $position;
    public function __construct($img, $name, $birthday, $address, $position)
    {
        $this->img = $img;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->position = $position;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
}