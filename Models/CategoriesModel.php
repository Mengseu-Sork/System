<?php
require_once "Database/Database.php";

class CategoriesModel{
    private $DB;

    function __construct() {
        $this->DB = new Database();
    }
    public function getAllCategories() {
        $result = $this->DB->query("SELECT * FROM categories");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data){
        try {
            $stmt = "INSERT INTO categories (name, description) 
                     VALUES (:name, :description)";
            $this->DB->query($stmt, [
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
            return true;
        } catch (Exception $e) {
            error_log("Error creating categories : " . $e->getMessage());
            return false;
        }
    }

        function getCategoryById($id){
        try {
            $query = "SELECT * FROM categories WHERE category_id = :category_id";
            $result = $this->DB->query($query, ['category_id' => $id]);
            return $result->fetch();
        } catch (Exception $e) {
            error_log("Error getting category by ID: " . $e->getMessage());
            return false;
        }
    }

     function updateCategories($id, $data)
    {
        return $this->DB->query("UPDATE categories SET name = :name, description = :description WHERE category_id = :category_id", [
            'name' => $data['name'],
            'description' => $data['description'],
            'category_id' => $id
        ]);
    }

    public function deleteUser($id)
    {
        return $this->DB->query("DELETE FROM categories WHERE category_id = :category_id", ['category_id' => $id]);
    }
}