<?php

namespace Engine\Core\Config;


class Config
{
  /**
   * [item description]
   * @param  [type] $key   [description]
   * @param  string $group [Название кофига]
   * @return [type]        [description]
   */
  public static function item($key, $group = 'main')
  {
    $groupItems = static::file($group);

    return isset($groupItems[$key]) ? $groupItems[$key] : null;
  }

/**
 * [Получение файла кофига группы]
 * @param  [type] $group [Название кофига]
 * @return [type]        [description]
 */
  public static function file($group)
  {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . mb_strtolower(ENV) . '/Config/' . $group . '.php';
    if(file_exists($path))
    {
      $items = require_once $path;
      if(is_array($items))
      {
        return $items;
      }
      else
      {
        throw new \Exception(
          sprintf('Config file <strong>%s</strong> is not valid array.',$path)
        );
      }
    }
    else
    {
      throw new \Exception (
        sprintf('Cannot load config from file, file <strong>%s</strong> does not exist.', $path)
      );
    }
    return false;
  }
}
