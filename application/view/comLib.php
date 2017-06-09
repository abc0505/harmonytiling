<?php
include_once(MODEL_PATH . 'common_model.php');



$isLogin = false;
$ses_userId = null;
$ses_userFirstName = null;
$ses_userLastName = null;
$ses_userName = null;
$cartTotal = 0;
$cartCnt = 0;

if(isset($_SESSION["user"])) {
  $user = $_SESSION["user"];
  $ses_userId = $user["user_id"];
  $ses_userFirstName = $user["user_first_name"];
  $ses_userLastName = $user["user_last_name"];
  $ses_userName = $ses_userFirstName . " " . $ses_userLastName;
  
  if($ses_userId !== "") {
    $isLogin = true;
  }
  
  
  // select cart summary
  $comModel = new CommonModel();
  
  try {
  	$comModel->db->connect();
  
  	$cartSum = $comModel->selectCartSummary($ses_userId);
  	$cartTotal = $cartSum['total'];
  	$cartCnt = $cartSum['cnt'];
  
  } catch(Exception $e) {
  	echo 'Caught exception: ',  $e->getMessage(), "\n";			
  } finally {
  	$comModel->db->close();
  }

}



// if it's not gadget_detail or not signup_view page, 
if(!($pid === "gadget_detail" || $pid === "signup_view")) {
  if(isset($_SESSION["prevPidObj"])) {
  	$_SESSION["prevPidObj"] = null;
  }
}



?>