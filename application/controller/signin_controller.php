<?php
include_once(MODEL_PATH . $aryPid[0] . '_model.php');

class Controller {
	public $pid;
	public $model;
	
	public function __construct() {  
		$this->model = new Model();
	} 
	
	public function invoke($pid) {
		$this->pid = $pid;

		if($pid == "signin_view") {
			$this->signin_view($pid);
		} else if($pid == "signin_out") {
			$this->signin_out($pid);
		} else {
			$this->wrong_request();
		}
	}

	
	public function signin_view($pid) {
		
		$nextPid = "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
		$viewPage = "";
		$errMsg = "";

		if($email === "") {  // call a login screen at the first time
			$viewPage = $pid;
			
		} else {  // tried to login
			
			try {
				$this->model->db->connect();
				
				$rows = $this->model->selectUser($email, $password);
	
				if(count($rows) > 0) {  // success login
					foreach($rows as $row) {
						$_SESSION["user"] = $row;
					}
	
					$viewPage = "redirect";
					$nextPid = "index_view";
					
				} else {  // something wrong
					$errMsg = "Wrong Email or Password. Please try again.";				
					$viewPage = $pid;
				}

			} finally {
				$this->model->db->close();
			}

		}

		include_once(VIEW_PATH . $viewPage . '.php');
		
	}
	

	public function signin_out($pid) {
		
		$_SESSION["user"] = null;
		$_SESSION["prevPidObj"] = null;
		$ses_userId = null;
		$ses_userFirstName = null;
		$ses_userLastName = null;
		$ses_userName = null;
		
		$nextPid = "index_view";
		include_once(VIEW_PATH . 'redirect.php');
		
	}
	
	public function wrong_request() {
		include_once(VIEW_PATH . 'wrong_request.php');
	}


}

?>