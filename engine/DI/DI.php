<?php

namespace Engine\DI;


//dependency injection
class DI {

/**
* @var array
*/
private $conteiner =[];
/**
 * [set fun]
 * @param [type] $key   [description]
 * @param [type] $value [description]
 */
public function set($key, $value)
{
  $this->conteiner[$key] = $value;
  return $this;
}

/**
 * [get description]
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
public function get($key)
{
  return $this->has[$key];
}
/**
 * [has description]
 * @param  [type]  $key [description]
 * @return boolean      [description]
 */
public function has($key)
{
  return isset($this->conteiner[$key]);
}
}
