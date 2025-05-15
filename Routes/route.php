<?php
require_once "Router.php";
require_once "Controllers/DashboardController.php";
require_once "Controllers/PageloginController.php";
require_once "Controllers/UserController.php";
require_once "Controllers/ProductController.php";

$routes = new Router();

// dashboard
$routes->get('/Dashboard', [DashboardController::class, 'index']);

// Pages
$routes->get('/', [PageloginController::class, 'page']);

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


$routes->dispatch();