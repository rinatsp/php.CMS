<?php


namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;
class Provider extends AbstractProvider
{
  /**
   * [$serviceName description]
   * @var string
   */
public $serviceName = 'router';


/**
 * [init description]
 * @return mixed
 */
public function init(){
  $router = new Router('http://localhost/php.cms');
  $this->di->set($this->serviceName, $router);
}


}
