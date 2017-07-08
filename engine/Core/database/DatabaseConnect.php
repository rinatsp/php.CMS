<?php

namespace Engine\Core\database;

use \PDO;
class DatabaseConnect{

private $link;

private function connect()
{
  $config =  [
    'host'      =>'',
    'db_name'   =>'',
    'username'  =>'',
    'password'  =>'',
    'charset'   =>'',
  ];
  $dns = 'mysql:host='.$config['host'].';dbmane='.$config['db_name'].';charset='.$config['charset'];
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
public function execute($sql)
{
    $sth = $this->link->prepare($sql);
    return $sth->execute();
}

/**
 * [query description]
 * @param  [type] $sql
 * @return array
 */
public function query($sql)
{
  $sth = $this->link->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  if($result === false)
  {
    return [];
  }
  return $result;
}

}
