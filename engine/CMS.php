<?php


namespace Engine;
use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRoute;
class CMS {
  /**
   * [$di DI]
   * @var [DI]
   */
  private $di;
  public $router;

/**
 * [___construct description]
 * @param  [type] $di [description]
 * @return [type]     [description]
 */
public function __construct($di)
{
  $this->di = $di;
  $this->router = $this->di->get('router');
}

/**
 * [Run application]
 */
public function run()
{

  try{
  require_once __DIR__ . '/../cms/Route.php';
  $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
  if($routerDispatch == null)
  {
    $routerDispatch = new DispatchedRoute('ErrorController:page404');
  }
  list ($class, $action) = explode(':', $routerDispatch->getController(), 2);
  $controller = '\\cms\Controller\\'.$class;
  $parameters = $routerDispatch->getParameters();
  call_user_func_array([new $controller($this->di), $action], $parameters);

  }catch(\Exception $e){
  $e->getMessage();
  }

  //print_r($routerDispatch);

}

  }
