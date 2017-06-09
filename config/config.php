<?php

/** Configuration Variables **/
define('DS', DIRECTORY_SEPARATOR);
define ('DEVELOPMENT_MODE',true);

define('DB_HOST', getenv('IP'));
define('DB_USER', getenv('C9_USER'));
define('DB_PASSWORD', '');
define('DB_NAME', 'harmony_tiling');

define('VIEW_PATH', ROOT . DS . 'application' . DS  . 'view' . DS );
define('MODEL_PATH', ROOT . DS . 'application' . DS  . 'model' . DS );
define('CONTROLLER_PATH', ROOT . DS . 'application' . DS  . 'controller' . DS );
define('CONFIG_PATH', ROOT . DS . 'config' . DS);

define('PAGINATE_LIMIT', '5');


/** Check if environment is development and display errors **/

function setReporting() {
  if (DEVELOPMENT_MODE == true) {
  	error_reporting(E_ALL);
  	//error_reporting(E_ALL ^ E_NOTICE);
  	ini_set('display_errors','On');
  } else {
  	error_reporting(E_ALL);
  	ini_set('display_errors','Off');
  	ini_set('log_errors', 'On');
  	//ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
  }
}

function nvl($str, $chgStr) {
  if(isset($str)) {
    return trim($str);
  } else {
    if(isset($chgStr)) {
      return $chgStr;
    } else {
      return "";
    }
  }
}

function generateDateTime(){
    $date = new DateTime("now", new DateTimeZone('Australia/Sydney') );
    $date = $date->format("Y-m-d H:i:s");
    return $date;
}



setReporting();

session_start();


?>


