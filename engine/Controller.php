<?php



namespace Engine;

use \Engine\DI\DI;

abstract class Controller{
  /**
   * [$di description]
   * @var \Engine\DI\DI
   */
  protected $di;
  protected $db;
  protected $view;
  protected $config;
  protected $request;

  public function __construct(DI $di)
  {
    $this->di      = $di;
    $this->view    = $this->di->get('view');
    $this->config  = $this->di->get('config');
    $this->request = $this->di->get('request');
  }


}
