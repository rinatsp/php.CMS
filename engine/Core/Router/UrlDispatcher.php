<?php

namespace Engine\Core\Router;

class UrlDispatcher{

  /**
   * [$metod description]
   * @var array
   */
  private $metod = [
    'GET',
    'POST'
  ];

  /**
   * [$routes description]
   * @var array
   */
  private $routes = [
    'GET'   => [],
    'POST'  => []
  ];

  /**
   * [$patterns description]
   * @var array
   */
  private $patterns = [
    'int' =>  '[0-9]+',
    'str' =>  '[a-zA-Z\.\-_%]+',
    'any' =>  '[a-zA-Z0-9\.\-_%]+'
  ];

  /**
   * [addPattren description]
   * @param [type] $key     [description]
   * @param [type] $pattern [description]
   */
  public function addPattren($key, $pattern)
  {
    $this->patterns[$key] = $pattern;
  }
  public function dispatch($metod, $uri)
  {

  }
}
