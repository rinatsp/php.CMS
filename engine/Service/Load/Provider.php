<?php


namespace Engine\Service\Load;

use Engine\Service\AbstractProvider;
use Engine\Load;
class Provider extends AbstractProvider
{
  /**
   * [$serviceName description]
   * @var string
   */
public $serviceName = 'load';


/**
 * [init description]
 * @return mixed
 */
public function init(){
  $load = new Load();
  $this->di->set($this->serviceName, $load);
}
}
