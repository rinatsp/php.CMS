<?php


namespace Engine\Service\Request;

use Engine\Service\AbstractProvider;
use Engine\Core\Request\Request;
class Provider extends AbstractProvider
{
  /**
   * [$serviceName description]
   * @var string
   */
public $serviceName = 'request';


/**
 * [init description]
 * @return mixed
 */
public function init(){
  $request = new Request();
  $this->di->set($this->serviceName, $request);
}


}
