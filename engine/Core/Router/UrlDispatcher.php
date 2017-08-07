<?php

namespace Engine\Core\Router;
use Engine\Core\Router\DispatchedRoute;

class UrlDispatcher{

  /**
   * [$method description]
   * @var array
   */
  private $method = [
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
   * [routes description]
   * @param  [type] $method [description]
   * @return [type]         [description]
   */
  private function routes($method)
  {
    return isset($this->routes[$method]) ? $this->routes[$method] :[];
  }


/**
 * [Регистрация пути URL]
 * @param  [type] $method     [description]
 * @param  [type] $pattern    [description]
 * @param  [type] $controller [description]
 * @return [type]             [description]
 */
  public function register($method, $pattern, $controller)
  {
    $convert = $this->convertPattern($pattern);
    $this->routes[strtoupper($method)][$convert] = $controller;
  }

  private function convertPattern($pattern)
  {
    if(strpos($pattern, '(') === false)
    {
      return $pattern;
    }
    return preg_replace_callback('#\((\w+):(\w+)\)#',[$this , 'replacePattern'], $pattern);
  }

  private function replacePattern($matches)
  {
    return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->patterns) . ')';
  }
  private function processParam($parameters)
  {
    foreach($parameters as $key => $value)
    {
      if(is_int($key))
      {
        unset($parameters[$key]);
      }
    }
    return $parameters;
  }
  /**
   *
   * [addPattren description]
   * @param [type] $key     [description]
   * @param [type] $pattern [description]
   */
  public function addPattren($key, $pattern)
  {
    $this->patterns[$key] = $pattern;
  }


/**
 * [dispatch description]
 * @param  [type] $method [description]
 * @param  [type] $uri    [description]
 * @return [type]         [description]
 */
  public function dispatch($method, $uri)
  {
    $routes = $this->routes(strtoupper($method));
    if(array_key_exists($uri, $routes))
    {
      return new DispatchedRoute($routes[$uri]);
    }
    return $this->doDispatch($method, $uri);
  }
  /**
   * [doDispatch description]
   * @param  [type] $method [description]
   * @param  [type] $uri    [description]
   * @return [type]         [description]
   */
  public function  doDispatch($method, $uri)
  {
    foreach($this->routes($method) as $route => $controller)
    {
      $pattern = '#^' . $route . '$#s';
      if(preg_match($pattern, $uri , $parameters))
      {
        return new DispatchedRoute($controller, $this->processParam($parameters));
      }
    }
  }

}
