<?php

namespace cms\Controller;

class HomeController extends CMSController
{
  public function index()
  {
    $data = ['name' => 'Artem'];
    $this->view->render('index', $data);
  }
  public function news($id)
  {
    echo 'news PAge'. $id;
  }


}
