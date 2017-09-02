<?php

namespace Engine\Core\Auth;

use Engine\Helper\Cookie;

class Auth implements AuthInterface
{
  protected $authorized = false;
  protected $user;


  public function authorized()
  {
    return $this->authorized;
  }

  public function user()
  {
    return $this->user;
  }

  public function authorize($user)
  {
    Cookie::set('auth_authorized', true);
    Cookie::set('auth_user', $user);
    $this->authorized = true;
    $this->user       = $user;
  }

  public function unAuthorize()
  {
    Cookie::delete('auth_authorized');
    Cookie::delete('auth_user');
    $this->authorized = false;
    $this->user       = null;
  }

  public static function salt()
  {
    return (string) rand(10000000, 99999999);
  }

  public static function encryptePassword($password, $salt = '')
  {
    return hash('sha256', $password, $salt);
  }
}
