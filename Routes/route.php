<?php
require_once "Router.php";
require_once "Controllers/DashboardController.php";
require_once "Controllers/UserController.php";
require_once "Controllers/ProductController.php";
require_once "Controllers/CategoryController.php";
require_once "Controllers/AuthController.php";
require_once "Controllers/PaymentController.php";
require_once "Controllers/ProfileController.php";


$routes = new Router();


// Authentication
$routes->get('/', [AuthController::class, 'login']);
$routes->post('/auth/login', [AuthController::class, 'login']);
$routes->get('/auth/register', [AuthController::class, 'register']);
$routes->post('/auth/register', [AuthController::class, 'register']);
$routes->get('/auth/logout', [AuthController::class, 'logout']);


// dashboard
$routes->get('/Dashboard', [DashboardController::class, 'index']);


// Profile user
$routes->get('/profile', [ProfileController::class, 'profile']);
// Pages


// user
$routes->get('/users', [UserController::class, 'index']);
$routes->get('/users/create', [UserController::class, 'create']);
$routes->post('/users/store', [UserController::class, 'store']);
$routes->get('/users/edit', [UserController::class, 'edit']);
$routes->post('/users/update', [UserController::class, 'update']);
$routes->delete('/users/delete', [UserController::class, 'destroy']);
$routes->get('/users/show', [UserController::class, 'show']);

//Products
$routes->get('/productsList', [ProductController::class, "product"]);
$routes->get('/productsList/create', [ProductController::class, "create"]);
$routes->post('/productsList/store', [ProductController::class, "store"]);
$routes->get('/productsList/edit', [ProductController::class, 'edit']);
$routes->post('/productsList/update', [ProductController::class, 'update']);
$routes->delete('/productsList/delete', [ProductController::class, 'destroy']);
$routes->get('/productsList/detail', [ProductController::class, 'show']);

//Category
$routes->get("/categoriesList", [CategoryController::class, "index"]);
$routes->get('/categoriesList/create', [CategoryController::class, "create"]);
$routes->post('/categoriesList/store', [CategoryController::class, "store"]);
$routes->get('/categoriesList/edit', [CategoryController::class, 'edit']);
$routes->post('/categoriesList/update', [CategoryController::class, 'update']);
$routes->delete('/categoriesList/delete', [CategoryController::class, 'destroy']);


//Payment
$routes->get('/payment', [PaymentController::class, 'payment']);



$routes->dispatch();