<?php
require_once(__DIR__ . '/../Database/Database.php');

$DB = new Database();

$stmt = $DB->query("SELECT 
    name,
    image,
    stock_quantity
  FROM products
  WHERE stock_quantity <= 5
");

$outOfStockProducts = [];

while ($row = $stmt->fetch()) {
    $outOfStockProducts[] = [
        'name' => $row['name'],
        'image' => $row['image'],
        'stock_quantity' => (int)$row['stock_quantity']
    ];
}

header('Content-Type: application/json');
echo json_encode($outOfStockProducts);

