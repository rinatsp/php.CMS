<?php

namespace Engine\Core\database;

use \PDO;
use Engine\Core\Config\Config;

class DatabaseConnect{

private $link;

private function connect()
{
  $config =  Config::file('database');
  $dns = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
  $this->link = new PDO($dns, $config['username'], $config['password']);
  return $this;
}
/**
 * [__construct connection]
 */
public function __construct()
{
  $this->connect();
}

/**
 * [execute description]
 * @param  [type] $sql [description]
 * @return [type] mixed
 */
public function execute($sql, $values = [])
{
    $sth = $this->link->prepare($sql);
    return $sth->execute($values);
}

/**
 *
 */
public function query($sql, $values = [])
{
  $sth = $this->link->prepare($sql);
  $sth->execute($values);
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  if($result === false)
  {
    return [];
  }
  return $result;
}

}
