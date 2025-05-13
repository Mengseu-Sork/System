<?php
require_once "Router.php";
require_once "Controllers/DashboardController.php";

$routes = new Router();

// dashboard
$routes->get('/Dashboard', [DashboardController::class, 'index']);


$routes->dispatch();