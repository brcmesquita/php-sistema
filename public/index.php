<?php

session_start();
require_once '../src/config/database.php';
require_once '../src/routes/routes.php';
$path = $_SERVER['REQUEST_URI'];
if (array_key_exists($path, $routes)) {
    $action = $routes[$path];
    require_once '../src/controllers/' . $action;
    $controllerClassName = ucfirst($action) . 'Controller';
    $controller = new $controllerClassName();
    if (method_exists($controller, $action)) {
        $controller->{$action}();
    } else {
        header('HTTP/1.1 404 Not Found');
        include '../src/views/404_view.php';
        exit;
    }
} else {
    header('HTTP/1.1 404 Not Found');
    include '../src/views/404_view.php';
    exit;
}
