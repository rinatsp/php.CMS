<?php


namespace Admin\Controller;
use Engine\Controller;
use Engine\Core\Auth\Auth;
/**
 *
 */
class AdminController extends Controller
{
  protected $auth;

/**
 * [__construct description]
 * @param [type] $di [description]
 */
  public function __construct($di)
  {
    parent::__construct($di);
    $this->auth = new Auth();
    $this->checkAuthorization();
    if ($this->auth->hashUser() == null) {
      header('Location: /admin/login/');
      exit;
    }
  }

  public function checkAuthorization()
  {

  }
  public function logout()
  {
    $this->auth->unAuthorize();
    header('Location: /admin/login/');
    exit;
  }
}
