<?php

session_start();

require 'Routing.php';

$path = parse_url(trim($_SERVER['REQUEST_URI'], '/'), PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('account', 'SecurityController');
Routing::get('rent', 'CarController');
Routing::get('cars', 'CarController');
Routing::get('manageCars', 'CarController');
Routing::post('apiAddCar', 'CarController');
Routing::post('apiUpdateCar', 'CarController');
Routing::post('apiDeleteCar', 'CarController');
Routing::post('apiLogin', 'SecurityController');
Routing::get('logout', 'SecurityController');
Routing::post('apiRegister', 'SecurityController');
Routing::post('apiRent', 'RentalController');
Routing::post('apiReturn', 'RentalController');
Routing::get('manageRepairs', 'RepairController');
Routing::post('apiAddRepair', 'RepairController');
Routing::post('apiUpdateRepair', 'RepairController');
Routing::post('apiDeleteRepair', 'RepairController');
Routing::get("services", "ServiceController");
Routing::get("users", "ManagementController");
Routing::post("apiChangeUserRole", "ManagementController");
Routing::run($path);
