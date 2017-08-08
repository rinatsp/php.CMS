<?php


namespace Engine\Service\View;

use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;
class Provider extends AbstractProvider
{
  /**
   * [$serviceName description]
   * @var string
   */
public $serviceName = 'view';


/**
 * [init description]
 * @return mixed
 */
public function init(){
  $view = new View();
  $this->di->set($this->serviceName, $view);
}


}
