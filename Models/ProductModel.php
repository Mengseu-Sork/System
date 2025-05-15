<?php
require_once "Database/Database.php";

class ProductModel{
    private $DB;

    function __construct() {
        $this->DB = new Database();
    }
    public function getAllCategories() {
        $result = $this->DB->query("SELECT * FROM categories ORDER BY category_id DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAllProducts() {
        try {
            $result = $this->DB->query("SELECT 
                products.product_id, 
                products.name,
                products.price, 
                products.stock_quantity, 
                products.image,
                products.category_id, 
                categories.name AS category_name
                FROM products 
                LEFT JOIN categories ON products.category_id = categories.category_id
                LEFT JOIN stock_entries ON products.product_id = stock_entries.product_id");
            return $result->fetchAll();
        } catch (Exception $e) {
            error_log("Error fetching products: " . $e->getMessage());
            return [];
        }
    }

    function getProductTypes() {
        try {
            $result = $this->DB->query("SELECT category_id, name FROM categories");
            return $result->fetchAll();
        } catch (Exception $e) {
            error_log("Error fetching product types: " . $e->getMessage());
            return [];
        }
    }

    function createProduct($data) {
        try {
            $stmt = "INSERT INTO products (name, price, category_id, stock_quantity, image) 
                     VALUES (:name, :price, :category_id, :stock_quantity, :image)";
            $this->DB->query($stmt, [
                'name' => $data['name'],
                'price' => $data['price'],
                'category_id' => $data['category_id'],
                'stock_quantity' => $data['stock_quantity'],
                'image' => $data['image']
            ]);
            return true;
        } catch (Exception $e) {
            error_log("Error creating product: " . $e->getMessage());
            return false;
        }
    }

    function getProductById($id){
        try {
            $query = "SELECT * FROM products WHERE product_id = :product_id";
            $result = $this->DB->query($query, ['product_id' => $id]);
            return $result->fetch();
        } catch (Exception $e) {
            error_log("Error getting product by ID: " . $e->getMessage());
            return false;
        }
    }

    function upstock_quantityProduct($data){
        try {
            $stmt = "UPstock_quantity products SET 
                    name = :name, 
                    price = :price, 
                    category_id = :category_id, 
                    stock_quantity = :stock_quantity";
            
            $params = [
                'name' => $data['name'],
                'price' => $data['price'],
                'category_id' => $data['category_id'],
                'stock_quantity' => $data['stock_quantity'],
                'product_id' => $data['product_id']
            ];
            
            if (!empty($data['image'])) {
                $stmt .= ", image = :image";
                $params['image'] = $data['image'];
            }
            
            
            $stmt .= " WHERE product_id = :product_id";
            
            $this->DB->query($stmt, $params);
            return true;
        } catch (Exception $e) {
            error_log("Error updating product: " . $e->getMessage());
            return false;
        }
    }

    function getCategoryById($category_id) {
        try {
            $query = "SELECT * FROM categories WHERE category_id = :category_id";
            $result = $this->DB->query($query, ['category_id' => $category_id]);
            return $result->fetch();
        } catch (Exception $e) {
            error_log("Error getting category by ID: " . $e->getMessage());
            return false;
        }
    }
    
    function deleteProduct($id){
        try {
            $stmt = "DELETE FROM stock_entries WHERE product_id = :id";
            $this->DB->query($stmt, ['id' => $id]);
    
            $stmt = "DELETE FROM products WHERE product_id = :product_id";
            $this->DB->query($stmt, ['product_id' => $id]);
    
            return true;
        } catch (Exception $e) {
            error_log("Error deleting product: " . $e->getMessage());
            return false;
        }
    }
}
?>