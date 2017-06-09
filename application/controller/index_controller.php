<?php

if(isset($aryPid)) {
	include_once(MODEL_PATH . $aryPid[0] . '_model.php');
} else {
	include_once(MODEL_PATH . 'index_model.php');
}

class Controller {
	public $pid;
	public $model;

	public function __construct() {  
		$this->model = new Model();
	} 


	public function invoke($pid) {
		$this->pid = $pid;

		if($pid == "index_view") {
			$this->index_view($pid);
		} else {
			$this->wrong_request();
		}

	}



	public function index_view($pid) {

		try {
			$this->model->db->connect();

			$rows = $this->model->selectOfferList();

		} catch(Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}

		include_once(VIEW_PATH . $pid . '.php');

	}

	public function wrong_request() {
		include_once(VIEW_PATH . 'wrong_request.php');
	}


}

?>