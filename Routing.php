<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/CarController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/RentalController.php';
require_once 'src/controllers/RepairController.php';
require_once 'src/controllers/ServiceController.php';
require_once 'src/controllers/ManagementController.php';

class Routing
{
    public static $routes;

    public static function get($url, $view)
    {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view)
    {
        self::$routes[$url] = $view;
    }

    public static function run($url)
    {
        $action = ($url === "") ? "index" : explode("/", $url)[0];

        if (!array_key_exists($action, self::$routes)) {
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $object->$action();
    }
}
