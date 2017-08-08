<?php

namespace cms\Controller;

class HomeController extends CMSController
{
  public function index()
  {
    $this->view->render('index');
  }
  public function news($id)
  {
    echo 'news PAge'. $id;
  }


}
