<?php
require_once "BaseController.php";
require_once "Models/DashboardModel.php";

class DashboardController extends BaseController{

    private $model;
    function __construct()
    {
        $this->model =  new DashboardModel();
    }


    public function index(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user'])) {
            header("Location: views/auth/login");
            exit();
        }
    
        $totalProducts = $this->model->getProductCount();
        $stockProducts = $this->model->getTotalProductQuantity();

        $this->view('/dashboard/list', [
            "totalProducts" => $totalProducts,
            "stockProducts" => $stockProducts
        ]);
    }
}