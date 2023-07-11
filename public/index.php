<?php
session_start();

$routes = require_once '../config/routes.php';
require_once '../app/controllers/TodoController.php';
require_once '../app/models/TodoModel.php';
$config = require_once '../config/database.php';

$pdo = new PDO(
  'mysql:host='
  . $config['host']
  . ';dbname='
  . $config['dbname'],
  $config['username'],
  $config['password']
);

$model = new TodoModel($pdo);
$controller = new TodoController($model);

$path = $_SERVER['REQUEST_URI'];
if (array_key_exists($path, $routes)) {
  $action = $routes[$path];
  $controller->$action(); 
} else {
  header('HTTP/1.1 404 Not Found');
  include '../views/404.php';
  exit;
}

