<?php
  // Load Config
  require_once 'config/config.php';
  require_once 'helpers/url_helper.php';
  require_once 'helpers/session_helper.php';
  require_once 'helpers/error_helper.php';
  require_once 'helpers/fun_helper.php';
  error_reporting(E_ERROR | E_PARSE);

  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
?>