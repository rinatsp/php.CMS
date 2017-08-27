<?php


namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;
class Provider extends AbstractProvider
{
  /**
   * [$serviceName description]
   * @var string
   */
public $serviceName = 'config';


/**
 * [init description]
 * @return mixed
 */
public function init(){
  $config['main'] = Config::file('main');
  $config['datebase'] = Config::file('database');
  $this->di->set($this->serviceName, $config);
}


}
