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
		
		$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : (isset($_GET['product_id']) ? $_GET['product_id'] : "");

		if($pid == "cart_list") {
			$this->cart_list($pid);
		} else if($pid == "cart_total") {	
			$this->cart_ajaxTotal($pid);
		} else if($pid == "cart_removeProduct") {	
			$this->cart_ajaxRemoveProduct($pid, $product_id);
		} else if($pid == "cart_checkout") {	
			$this->cart_ajaxCheckOut($pid);
		} else if($pid == "cart_checkoutComplete") {	
			$this->cart_checkoutComplete($pid);
		} else {
			$this->wrong_request();
		}

	}


	public function cart_list($pid) {
		$user = null;
		
		if(isset($_SESSION["user"])) {  // if login
			$user = $_SESSION["user"];

			try {
				$this->model->db->connect();
	
				$rows = $this->model->selectCartList($user['user_id']);
	
			} catch(Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";			
			} finally {
				$this->model->db->close();
			}

			include_once(VIEW_PATH . 'cart_list.php');
			
		} else {
			$nextPid = "signup_view";
			include_once(VIEW_PATH . 'redirect.php');
		}

	}


	public function cart_ajaxTotal($pid) {
		$output = json_encode(array("total"=>0, "cnt"=>0));

		try {
			$this->model->db->connect();

			// login check
			if(isset($_SESSION["user"])) {  // if login
				$user = $_SESSION["user"];
				$user_id = $user["user_id"];
				$row = $this->model->selectCartSummary($user_id);
				
				$array = array("total"=>$row['total'], "cnt"=>$row['cnt']);
				$output = json_encode($array);
			}

		} catch(Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}

		echo $output;

	}


	public function cart_ajaxRemoveProduct($pid, $product_id) {
		$aryOutput = array("status"=>"", "total"=>0, "cnt"=>0);

		try {
			$this->model->db->connect();

			// login check
			if(isset($_SESSION["user"])) {  // if login
				$user = $_SESSION["user"];
				$user_id = $user["user_id"];
				
				$result = $this->model->deleteProductInCart($user_id, $product_id);
				$aryOutput["status"] = $result;

				$row = $this->model->selectCartSummary($user_id);
				$aryOutput["total"] = $row['total'];
				$aryOutput["cnt"] = $row['cnt'];
			}

		} catch(Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";			
		} finally {
			$this->model->db->close();
		}

		echo json_encode($aryOutput);

	}



	public function cart_ajaxCheckOut($pid) {
		$aryOutput = array("status"=>"", "msg"=>"", "orderId"=>"");

		try {
			$this->model->db->connect();
			$this->model->db->autocommit(false);

			// login check
			if(isset($_SESSION["user"])) {  // if login
				$user = $_SESSION["user"];
				$user_id = $user["user_id"];
				
				// select items in a cart
				$cartList = $this->model->selectCartList($user_id);
				
				// insert product_order and get order_id
				$order_id = $this->model->insertProductOrder($user_id);
				if(!isset($order_id)) {
					throw new Exception("can not get order_id");
				}
				
				$aryProducts = array();
				$productCnt = 0;
				foreach($cartList as $product) {
					$productCnt++;
					$product_id = $product['product_id'];
					$quantity = $product['quantity'];
					$price = $product['price'];
					$aryProducts[] = array("user_id"=>$user_id, "order_id"=>$order_id, "product_id"=>$product_id, "quantity"=>$quantity, "price"=>$price);
				}
				
				// insert product_order_detail
				$affectedRows = $this->model->insertProductOrderDetail($aryProducts);
				if($affectedRows !== $productCnt) {
					throw new Exception("Exception at insertProductOrderDetail");
				}

				// update sold_count and stock on product table
				$affectedRows = $this->model->updateProduct($aryProducts);
				if($affectedRows !== $productCnt) {
					throw new Exception("Exception at updateProduct");
				}

				// delete items in the cart
				$affectedRows = $this->model->deleteProductsInCartAfterCheckout($aryProducts);
				if($affectedRows !== $productCnt) {
					throw new Exception("Exception at deleteItemsInCart");
				}

				$this->model->db->commit();
				$aryOutput["status"] = "success";
				$aryOutput["orderId"] = $order_id;
			}

		} catch(Exception $e) {
			$this->model->db->rollback();
			$aryOutput = array("status"=>"Exception", "msg"=>($e->getMessage()));
		} finally {
			$this->model->db->autocommit(true);
			$this->model->db->close();
		}

		echo json_encode($aryOutput);

	}


	public function cart_checkoutComplete($pid) {
		$user = null;
		$order_id = isset($_POST['order_id']) ? $_POST['order_id'] : (isset($_GET['order_id']) ? $_GET['order_id'] : "");

		include_once(VIEW_PATH . 'cart_checkoutComplete.php');

		// if(isset($_SESSION["user"])) {  // if login
		// 	$user = $_SESSION["user"];

		// 	try {
		// 		$this->model->db->connect();
	
		// 		// $rows = $this->model->selectCartList($user['user_id']);
	
		// 	} catch(Exception $e) {
		// 		echo 'Caught exception: ',  $e->getMessage(), "\n";			
		// 	} finally {
		// 		$this->model->db->close();
		// 	}

			
		// } else {
		// 	$nextPid = "signup_view";
		// 	include_once(VIEW_PATH . 'redirect.php');
		// }

	}







	public function wrong_request() {
		include_once(VIEW_PATH . 'wrong_request.php');
	}


}

?>