<?php
require_once "Database/Database.php";

class ProductModel{
    private $DB;

    function __construct() {
        $this->DB = new Database();
    }
    public function getAllCategories() {
        $result = $this->DB->query("SELECT * FROM categories");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}