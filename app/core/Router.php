<?php

namespace App\Core;

use App\Controllers\Errors\HttpErrorController;
use App\Core\functions;

class Router
{
  public function dispatch($url)
  {
    $url = trim($url, '/');
    $parts = $url ? explode('/', $url) : [];

    $controllerName = $parts[0] ?? 'Home';

    $controllerName = 'App\Controllers\\' . ucfirst($controllerName) . 'Controller';

    $actionName = $parts[1] ?? 'index';

    if (!class_exists($controllerName)) {
      $controller = new HttpErrorController();
      $controller->notFoundError();
      return;
    }

    $controller = new $controllerName();

    if (!method_exists($controller, $actionName)) {
      $controller = new HttpErrorController();
      $controller->notFoundError();
      return;
    }

    $params = array_slice($parts, 2);
    dd($params);

    call_user_func_array([$controller, $actionName], $params);
  }
}
