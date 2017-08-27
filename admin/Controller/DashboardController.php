<?php
namespace Admin\Controller;




class DashboardController extends AdminController
{
  public function index()
  {
    $this->view->render('dashboard');
  }

}
