<?php
class UserModel {
    private $DB;

    function __construct() {
        $this->DB = new Database();
    }

    function getUser(){
        return $this->DB->query('SELECT * FROM 	users ORDER BY 	user_id DESC')->fetchAll(); 
    }
}