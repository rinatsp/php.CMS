<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Engine\CMS;
use Engine\DI\DI;

try {
  // dependency injection
  $di = new DI();
  //run CMS
  $cms = new CMS($di);
  $cms->run();
} catch (Exception $e) {
  echo $e->getMessage();
}
