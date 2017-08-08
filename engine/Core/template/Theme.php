<?php

namespace Engine\Core\Template;


class Theme
{
  const RULES_NAME_FILE = [
    'header' => 'header-%s',
    'footer' => 'footer-%s',
    'sidebar' => 'sidebar-%s'
  ];
  public $url = '';

  public function header($name = null)
  {
    $name = (string) $name;

    if($name !== '')
    {
      $name = sprintf(self::RULES_NAME_FILE['header'], $name);
    }
    else
    {
      $name = 'header';
    }
    $this->loadTemplateFile($name);
  }

  public function footer($name = '')
  {

  }

  public function sidebar($name = '')
  {

  }

  public function block($name = '', $data = [])
  {

  }

  private function loadTemplateFile($nameFile, $data =  [])
  {
    $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';
    if(is_file($templateFile))
    {
      extract($data);
      require_once $templateFile;
    }
    else
    {
      throw new \Exception(sprintf('view file $s does not exist!', $templateFile));
    }
  }


}
