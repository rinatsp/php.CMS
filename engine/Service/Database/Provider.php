<?php


namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\database\DatabaseConnect;
class Provider extends AbstractProvider
{
  /**
   * [$serviceName description]
   * @var string
   */
public $serviceName = 'db';


/**
 * [init description]
 * @return mixed
 */
public function init(){
  $db = new DatabaseConnect();
  $this->di->set($this->serviceName, $db);
}


}
