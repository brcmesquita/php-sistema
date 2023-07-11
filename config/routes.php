<?php

$routes = [
  '/' => 'TodoController@index',
  '/add' => 'TodoController@add',
  '/complete' => 'TodoController@complete',
  '/delete' => 'TodoController@delete',
  '/login' => 'TodoController@login',
  '/logout' => 'TodoController@logout',
  '/register' => 'TodoController@register', // Rota para registro de usuário
  '/login-register' => 'TodoController@loginRegister' // Rota para a página de login e registro
];

return $routes;