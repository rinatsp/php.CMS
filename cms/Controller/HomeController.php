<?php

namespace cms\Controller;

class HomeController extends CMSController
{
  public function index()
  {
    echo 'index PAge';
  }
  public function news($id)
  {
    echo 'news PAge'. $id;
  }


}
