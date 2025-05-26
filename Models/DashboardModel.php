<?php
require_once 'Database/Database.php';

class DashboardModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

    public function getProductCount() {
        $sql = "SELECT COUNT(*) as total FROM products";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetch();
        return $result['total'];
    }

    public function getTotalProductQuantity() {
    $sql = "SELECT SUM(stock_quantity) as total_quantity FROM products";
    $stmt = $this->db->query($sql);
    $result = $stmt->fetch();
    return $result['total_quantity'];
}

    
}