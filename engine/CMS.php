<?php


namespace Engine;
class CMS {
  /**
   * [$di DI]
   * @var [DI]
   */
  private $di;
  public $router;

/**
 * [___construct description]
 * @param  [type] $di [description]
 * @return [type]     [description]
 */
public function __construct($di)
{
  $this->di = $di;
  $this->router = $this->di->get('router');
}

/**
 * [Run application]
 */
public function run()
{
  $this->router->add('home', '/', 'HomeController:index');
}

  }
