<?php 
  declare(strict_types=1); 

  function autoloader($class) {
    $path = 'classes/' . $class . '.php';

    if(file_exists($path)) {
      require_once $path;
    } else {
      echo "Class $class not found!";
    }
  }
  
  spl_autoload_register('autoloader');