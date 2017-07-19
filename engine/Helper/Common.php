<?php
namespace Engine\Helper;

/**
 *
 * @author rinat
 *        
 */
class Common
{    
   function isPost()
   {
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
           return true;
       }
       return false;
   }
   function getMethod()
   {
       return $_SERVER['REQUEST_METHOD'];
   }
    
}

