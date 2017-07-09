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
 * @param string $metod      [description]
 */
  public function add($key , $pattern, $controller, $metod ='GET')
  {
    $this->routes[$key] = [
      'pattern'     =>  $pattern,
      'controller'  =>  $controller,
      'metod'       =>  $metod
    ];
  }

  public function dispatch($metod, $uri)
  {

  }
  public function getDispatcher()
  {
    if($this->dispatcher == null)
    {

    }
    return $this->dispatcher;
  }
}
