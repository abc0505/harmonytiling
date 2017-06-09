<?php	
  define('DS', DIRECTORY_SEPARATOR);
  define('ROOT', dirname(dirname(__FILE__)));
  require_once(ROOT . DS . 'config' . DS . 'config.php');
  
  
  $pid = isset($_POST['pid']) ? $_POST['pid'] : (isset($_GET['pid']) ? $_GET['pid'] : "index_view");
  $aryPid = null;
  
  if($pid === "") {
    // echo "pid(". $pid .")";
    // echo VIEW_PATH ."wrong_request.php";
    // header("Location: ". VIEW_PATH ."wrong_request.php");  
    include_once(CONTROLLER_PATH . 'index_controller.php');
    
  } else {
    $aryPid = explode("_", $pid);
    
    include_once(CONTROLLER_PATH . $aryPid[0] . '_controller.php');
  }
  
  $controller = new Controller();
  $controller->invoke($pid);



?>