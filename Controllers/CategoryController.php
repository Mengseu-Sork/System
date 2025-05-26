<?php
require_once "Models/CategoriesModel.php";
require_once "BaseController.php";

class CategoryController extends BaseController {
    private $model;

    function __construct()
    {
        $this->model =  new CategoriesModel();
    }

    function index(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $categories = $this->model->getAllCategories();
        $this->view('/categories/categoriesList',['categories'=>$categories]);
    }

    public function create(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $this->view("categories/create");
    }

    function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            ];

            if ($this->model->create($data)) {
                $this->redirect('/categoriesList');
            } else {
                echo "Error: Failed to save product.";
            }
        }
    }

    public function edit($id)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $category = $this->model->getCategoryById($id);
        $this->view('/categories/edit',['category'=>$category]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['category_id'];

            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            ];

            if ($this->model->updateCategories($id, $data)) {
                $this->redirect('/categoriesList');
            } else {
                echo "Error: Failed to update category.";
            }
        }
    }


    public function destroy($id)
    {
        $this->model->deleteUser($id);
        $this->redirect('/categoriesList');
    }

}