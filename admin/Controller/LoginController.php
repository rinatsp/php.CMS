<?php
namespace Admin\Controller;


use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

class LoginController extends Controller
{
  protected $auth;
/**
 * [__construct description]
 * @param [type] $di [description]
 */
  public function __construct(DI $di)
  {
    parent::__construct($di);
    $this->auth = new Auth();
  }

  public function form()
  {
    $this->auth->authorize('sdsds');
    $this->view->render('login');
  }
  public function authAdmin()
  {
    $params= $this->request->post;
    $req = 'SELECT * FROM `user` WHERE email="' . $params['email'] . '" AND password="' . md5($params['password']) .'" LIMIT 1';
    $query = $this->db->query($req);
    if(!empty($query))
    {
      $user = $query[0];
      if($user['role'] == 'admin')
      {
        $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->auth->salt());
        $this->db->execute('UPDATE `user` SET hash="' . $hash .'" WHERE id=' . $user['id'].'');
        $this->auth->authorize($hash);

        header('Location: /admin/login/',true, 301);
      }
    }
  }

}
