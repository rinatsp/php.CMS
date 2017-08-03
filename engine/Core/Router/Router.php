<?php

namespace Engine\Core\Router;

class Router{
  private $routes = [];
  private $host;
  private $dispatcher;

  public function __construct($host)
  {
    $this->host = $host;
  }

/**
 * [add description]
 * @param [type] $key        [description]
 * @param [type] $pattern    [description]
 * @param [type] $controller [description]
 * @param string $method      [description]
 */
  public function add($key , $pattern, $controller, $method ='GET')
  {
    $this->routes[$key] = [
      'pattern'     =>  $pattern,
      'controller'  =>  $controller,
      'method'       =>  $method
    ];
  }
/**
 * [dispatch description]
 * @param  [string] $method [description]
 * @param  [type] $uri    [description]
 * @return [type]         [description]
 */
  public function dispatch($method, $uri)
  {
  return $this->getDispatcher()->dispatch($method, $uri);
  }

  public function getDispatcher()
  {
    if($this->dispatcher == null)
    {
      $this->dispatcher = new UrlDispatcher();
      foreach($this->routes as $route)
      {
        $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
      }
    }
    return $this->dispatcher;
  }
}
