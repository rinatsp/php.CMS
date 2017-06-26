<?php

namespace Engine\Core\database;


class DatabaseConnect{

private $link;

private function connect()
{

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
