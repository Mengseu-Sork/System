<?php 
require_once "Models/ProductModel.php";
require_once "BaseController.php";

class ProductController extends BaseController {
    private $model;

    function __construct()
    {
        $this->model =  new ProductModel();
    }
    function product()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $products = $this->model->getAllProducts();
        $categories = $this->model->getAllCategories();
        $this->view('/products/productsList',[
            'products'=>$products,
            'categories'=>$categories
        ]);
    }

    function create(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $categories = $this->model->getAllCategories();
        $this->view('/products/create', ['categories' => $categories]);
    }
    
    function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $imageName = null;

            // Handle Image Upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $target_dir = "Assets/images/uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                $imageName = basename($_FILES['image']['name']);
                $targetPath = $target_dir . $imageName;

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    echo "Error: Failed to upload image.";
                    return;
                }
            }

            // Prepare Data
            $data = [
                'name' => $_POST['name'],
                'price' => floatval($_POST['price']),
                'category_id' => $_POST['category_id'],
                'stock_quantity' => $_POST['stock_quantity'],
                'image' => $imageName,
            ];

            // Save Product to Database
            if ($this->model->createProduct($data)) {
                $this->redirect('/productsList');
            } else {
                echo "Error: Failed to save product.";
            }
        }
    }

    function edit(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->model->getProductById($id);
            if ($product) {
                $categories = $this->model->getAllCategories();
                $this->view('/products/edit', ['product' => $product, 'categories' => $categories]);
            } else {
                echo "Product not found";
                $this->redirect('/productsList');
            }
        } else {
            $this->redirect('/productsList');
        }
    }
    
    function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['product_id'];
            
            // Image Upload Handling
            $imageName = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $target_dir = "Assets/images/uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $imageName = basename($_FILES['image']['name']);
                $targetPath = $target_dir . $imageName;
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    echo "Error: Failed to upload image.";
                    return;
                }
            } else {
                $product = $this->model->getProductById($id);
                $imageName = $product['image'];
            }

            $data = [
                'product_id' => $id,
                'name' => $_POST['name'],
                'price' => floatval($_POST['price']),
                'category_id' => $_POST['category_id'],
                'stock_quantity' => $_POST['stock_quantity'],
                'image' => $imageName,
            ];
            
            if ($this->model->upstock_quantityProduct($data)) {
                $this->redirect('/productsList');
            } else {
                echo "Error: Failed to upstock_quantity product.";
            }
        }
    }
    
    function destroy() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->model->deleteProduct($id)) {
                $this->redirect('/productsList');
            } else {
                echo "Error: Failed to delete product.";
            }
        } else {
            $this->redirect('/productsList');
        }
    }
    function show($id = null) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if ($id === null && isset($_GET['product_id'])) {
            $id = $_GET['product_id'];
        }
        
        if (!$id) {
            echo "Error: No product ID specified.";
            return;
        }

        $product = $this->model->getProductById($id);

        $category = null;
        if ($product && isset($product['category_id'])) {
            $category = $this->model->getCategoryById($product['category_id']);
        }

        if ($product) {
            $this->view('/products/detail', [
                'product' => $product,
                'category' => $category
            ]);
        } else {
            $this->view('/products/detail', [
                'product' => null,
                'category' => null
            ]);
        }
    }
}
?>