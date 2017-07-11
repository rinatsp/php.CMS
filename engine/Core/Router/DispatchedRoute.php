<?php

namespace Engine\Core\Router;


class DispatchedRoute
{
  private  $controller;
  private  $parameters;

 /**
  * [__construct DispatchedRoute]
  * @param [type] $controller [description]
  * @param array  $parameters [description]
  */
  public function __construct($controller, $parameters = [])
  {
    $this->controller = $controller;
    $this->parameters = $parameters;
  }

  /**
   * [getController ]
   * @return [mixed] [description]
   */
  public function getController()
  {
    return $this->controller;
  }

  /**
   * [getParameters ]
   * @return [mixed] [description]
   */
  public function getParameters()
  {
    return $this->parameters;
  }

}
