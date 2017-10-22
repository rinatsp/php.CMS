<?php
namespace Admin\Controller;




class PageController extends AdminController
{
  public function listing()
  {
    $this->view->render('pages/list');
  }
}
