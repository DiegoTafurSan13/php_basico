<?php
namespace config;
class Date{
    public $localhost='127.0.0.1';
    public $db='deck';
    public $user='root';
    public $pass='';

    public function getLocalhost(){
        return $this->$localhost;
    }
    public function getUser(){
        return $this->$user;
    }
    public function getPass(){
        return $this->$pass;
    }
    public function getDb(){
        return $this->$db;
    }
       
}

