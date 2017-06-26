<?php

namespace Engine\Service;



abstract class AbstractProvider{

/**
 * @var Engine\DI\DI
 */
protected $di;
/**
 * [__construct description]
 * @param EngineDIDI $di [description]
 */
public function __construct(\Engine\DI\DI $di)
{
  $this->di =$di;
}
/**
 * [abstract description]
 * @var mixed
 */
abstract function init();


}
