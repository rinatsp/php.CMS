<?php
namespace Admin\Controller;




class LoginController extends AdminController
{
  public function form()
  {
    $this->view->render('login');
  }
}
