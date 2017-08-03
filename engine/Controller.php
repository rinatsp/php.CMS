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

  public function __construct(DI $di)
  {
    $this->di = $di;
  }


}
