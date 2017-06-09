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

		if($pid == "signup_view") {
			$this->signup_view($pid);
		} else if($pid == "signup_proc") {
			$this->signup_proc($pid);
		} else {
			$this->wrong_request($pid);
		}

	}


	public function signup_view($pid) {
		$errMsg = "";
		$nextPid = "";
		$viewPage = "";
		$type = isset($_POST['type']) ? $_POST['type'] : "";
		$user_first_name = isset($_POST['user_first_name']) ? $_POST['user_first_name'] : "";
		$user_last_name = isset($_POST['user_last_name']) ? $_POST['user_last_name'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$address = isset($_POST['address']) ? $_POST['address'] : "";
		$suburb = isset($_POST['suburb']) ? $_POST['suburb'] : "";
		$state = isset($_POST['state']) ? $_POST['state'] : "";
		$zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : "";
		$product_id = "";

		if($email === "") {  // call a login screen at the first time
			$viewPage = $pid;
			
		} else {  // do register or login
			try {
				$this->model->db->connect();
				$this->model->db->autocommit(false);
	
				// register ----------------------------------------------------------
				if($type === "register") {
		  		$password = password_hash($password,PASSWORD_DEFAULT);  // password hash

					$result = $this->model->insertUser($user_first_name, $user_last_name, $password, $email, $address, $suburb, $state, $zipcode);  // insert user
					
					if($result === "duplicate") {  // duplicate email
						$viewPage = $pid;
						$errMsg = "Your Email address already exists.";
						$this->model->db->rollback();
						
					} else {  // insert success
						$rows = $this->model->selectUser($email, $password);  // select user data
						
						foreach($rows as $row) {
							$_SESSION["user"] = $row;
						}
						
						$viewPage = "redirect";
						$nextPid = "index_view";
					}
					
					
				// login --------------------------------------------------------------	
				} else if($type === "login") {
					// echo password_hash($password,PASSWORD_DEFAULT);
					$rows = $this->model->selectUser($email, null);
		
					if(count($rows) > 0) {  // success login
						foreach($rows as $row) {
							$dbPassword = $row['user_password'];
							
							if(password_verify($password, $dbPassword)) {  // password is correct
								$_SESSION["user"] = $row;
								
								$viewPage = "redirect";
								$nextPid = "index_view";
				
								if(isset($_SESSION["prevPidObj"])) {
									$prevPidObj = $_SESSION["prevPidObj"];
									$nextPid = $prevPidObj["pid"];
									$product_id = $prevPidObj["product_id"];
								}
							} else {    // wrong password
								$errMsg = "Wrong Password. Please try again.";				
								$viewPage = $pid;
							}
						}

					} else {  // wrong email
						$errMsg = "Wrong Email. Please try again.";				
						$viewPage = $pid;
					}
				}

				$this->model->db->commit();
				
			} catch(Exception $e) {
				$this->model->db->rollback();
				//echo 'Caught exception: ',  $e->getMessage(), "\n";			
			} finally {
				$this->model->db->autocommit(true);
				$this->model->db->close();
			}
			
		}

		include_once(VIEW_PATH . $viewPage . '.php');

	}
	

	public function signup_proc($pid) {
		
		$errMsg = "";
		$user_first_name = isset($_POST['user_first_name']) ? $_POST['user_first_name'] : "";
		$user_last_name = isset($_POST['user_last_name']) ? $_POST['user_last_name'] : "";
		$user_password = isset($_POST['user_password']) ? $_POST['user_password'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$address = isset($_POST['address']) ? $_POST['address'] : "";
		$suburb = isset($_POST['suburb']) ? $_POST['suburb'] : "";
		$state = isset($_POST['state']) ? $_POST['state'] : "";
		$zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : "";


		try {
			$this->model->db->connect();
			$this->model->db->autocommit(false);

			$result = $this->model->insertUser($user_first_name, $user_last_name, $user_password, $email, $address, $suburb, $state, $zipcode);
			if($result === "duplicate") {
				$errMsg = "Your Email address already exists.";
				$this->model->db->rollback();
			}

			$this->model->db->commit();
		} catch(Exception $e) {
			$this->model->db->rollback();
			//echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}
		
		if($errMsg != "") {
			include_once(VIEW_PATH . 'signup_view.php');
		} else {
			$nextPid = "signin_view";
			include_once(VIEW_PATH . 'redirect.php');
		}

	}


	public function wrong_request() {
		include_once(VIEW_PATH . 'wrong_request.php');
	}

}

?>