<?php
function getDbConnection()
{
  static $pdo = null;

  if ($pdo === null) {
    $config = require_once '../src/config/config.php';

    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
    $username = $config['username'];
    $password = $config['password'];

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  return $pdo;
}