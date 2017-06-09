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

		if($pid == "search_view") {
			$this->search_view($pid);
		} else {
			$this->wrong_request();
		}
	}

	
	public function search_view($pid) {
		
		include_once(VIEW_PATH . $pid . '.php');
		
	}
	

	public function wrong_request() {
		include_once(VIEW_PATH . 'wrong_request.php');
	}


}

?>