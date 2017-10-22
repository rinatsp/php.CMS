<?php
namespace Admin\Controller;




class DashboardController extends AdminController
{
  public function index()
  {
    $userModel  = $this->load->model('User');

    $this->view->render('dashboard');
  }

}
