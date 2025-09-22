<?php

require_once('../app/controllers/HomeController.php');
require_once('../app/controllers/errors/HttpErrorController.php');

class Router
{
  public function dispatch($url)
  {
    // Remove os espaços vazios ou outros caracteres da string
    $url = trim($url, '/');

    // Retorna um array com as strings separadas pelo separador "/"
    // Se a URL estiver vazia, retornar um array vazio
    $parts = $url ? explode('/', $url) : [];

    // Pega o nome do controller que vem na URL e define-a
    $controllerName = $parts[0] ?? 'Home';
    $controllerName = ucfirst($controllerName) . 'Controller';

    $actionName = $parts[1] ?? 'index';

    // Verifica se o controlador (classe) existe, se não, usar o controlador HttpErrorController
    if (!class_exists($controllerName)) {
      $controller = new HttpErrorController();
      $controller->NotFoundError();
      return;
    }

    // Inicializando o controlador usando controllerName
    $controller = new $controllerName();

    // Verifica se o metodo existe dentro do controller
    if (!method_exists($controller, $actionName)) {
      $controller = new HttpErrorController();
      $controller->NotFoundError();
      return;
    }

    //Array de parametros dos actionNames (nomes das funções do controlador)
    // Esta função obtem os parametros que vem depois do campo controller/actionName/=>params
    $params = array_slice($parts, 2);

    call_user_func_array([$controller, $actionName], $params);
  }
}
