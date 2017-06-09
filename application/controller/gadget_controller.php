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
		$aryPid = explode("_", $pid);
		
		$category = isset($_POST['category']) ? $_POST['category'] : (isset($_GET['category']) ? $_GET['category'] : "");
		$orderby = isset($_POST['orderby']) ? $_POST['orderby'] : (isset($_GET['orderby']) ? $_GET['orderby'] : "1");
		$searchWord = isset($_POST['search_word']) ? $_POST['search_word'] : (isset($_GET['search_word']) ? $_GET['search_word'] : "");
		// $category = nvl($_POST['category'], $_GET['category']);

		$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : (isset($_GET['product_id']) ? $_GET['product_id'] : "");
		$order_quantity = isset($_POST['order_quantity']) ? $_POST['order_quantity'] : (isset($_GET['order_quantity']) ? $_GET['order_quantity'] : "");

		if($pid == "gadget_list") {
			$this->gadget_list($pid, $category, $orderby, $searchWord);
		} else if($pid == "gadget_salelist") {	
			$this->sales_list($pid, $category, $orderby);
		} else if($pid == "gadget_newitemlist") {	
			$this->newitems_list($pid, $category, $orderby);
		} else if($pid == "gadget_top50list") {	
			$this->top50_list($pid, $category, $orderby);
		} else if($pid == "gadget_detail") {	
			$this->gadget_detail($pid, $product_id);
		} else if($pid == "gadget_addcart") {	
			$this->gadget_ajaxAddCart($pid, $product_id, $order_quantity);
		} else {
			$this->wrong_request();
		}

	}


	public function gadget_list($pid, $category, $orderby, $searchWord) {

		try {
			$this->model->db->connect();

			$catetoryList = $this->model->selectCategoryList();
			$orderbyList = $this->model->selectOrderbyList();
			$rows = $this->model->selectGadgetList($category, $orderby, "Y", $searchWord);

		} catch(Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}

		include_once(VIEW_PATH . 'gadget_list' . '.php');

	}


	public function sales_list($pid, $category, $orderby) {

		try {
			$this->model->db->connect();

			$catetoryList = $this->model->selectCategoryList();
			$orderbyList = $this->model->selectOrderbyList();
			$rows = $this->model->selectSaleList($category);

		} catch(Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}

		include_once(VIEW_PATH . 'gadget_list' . '.php');

	}


	public function newitems_list($pid, $category, $orderby) {

		try {
			$this->model->db->connect();

			$catetoryList = $this->model->selectCategoryList();
			$orderbyList = $this->model->selectOrderbyList();
			$rows = $this->model->selectNewItemList($category);

		} catch(Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}

		include_once(VIEW_PATH . 'gadget_list' . '.php');

	}


	public function top50_list($pid, $category, $orderby) {

		try {
			$this->model->db->connect();

			$catetoryList = $this->model->selectCategoryList();
			$orderbyList = $this->model->selectOrderbyList();
			$rows = $this->model->selectTop50List($category);

		} catch(Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}

		include_once(VIEW_PATH . 'gadget_list' . '.php');

	}


	public function gadget_detail($pid, $product_id) {

		try {
			$this->model->db->connect();
			$row = $this->model->selectGadgetDetail($product_id);

		} catch(Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}

		include_once(VIEW_PATH . 'gadget_detail.php');

	}



	public function gadget_ajaxAddCart($pid, $product_id, $order_quantity) {

		$output = "";

		try {
			$this->model->db->connect();

			// login check
			if(isset($_SESSION["user"])) {  // if login
				$user = $_SESSION["user"];
				$user_id = $user["user_id"];
				
				$output = $this->model->insertCart($user_id, $product_id, $order_quantity);

				if(isset($_SESSION["prevPidObj"])) {
					$_SESSION["prevPidObj"] = null;
				}
			} else {  // if not login
				$_SESSION["prevPidObj"] = array("pid"=>"gadget_detail", "product_id"=>$product_id, "order_quantity"=>$order_quantity, "action"=>"addCart" );
				$output = "need login";
			}

		} catch(Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}

		echo $output;

	}





	public function wrong_request() {
		include_once(VIEW_PATH . 'wrong_request.php');
	}


}

?>