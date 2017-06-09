<?php
include_once(CONFIG_PATH . 'db.php');

class Model {
  
  public $db;
	
	public function __construct() {  
    $this->db = new Db();
	} 
	
  
  public function selectCartList($user_id) {
    $rows = null;
    $query = "";
    $query .= "  SELECT a.product_id                                        ";
    $query .= "        ,a.product_name                                      ";
    $query .= "        ,a.price                                             ";
    $query .= "        ,a.sale_price                                        ";
    $query .= "        ,a.image1                                            ";
    $query .= "        ,a.sale_yn                                           ";
    $query .= "        ,m.quantity                                          ";
    $query .= "  FROM cart AS m                                             ";
    $query .= "    LEFT JOIN product AS a ON m.product_id = a.product_id    ";
    $query .= "  WHERE user_id = $user_id                                   ";

    // echo "query===>$query";
    $rows = $this->db->select($query);

    return $rows;
  }
  
  
  
  public function selectCartSummary($user_id) {
    $result = null;
    $query = "";
    $query .= "  SELECT CASE WHEN SUM(c.price * c.quantity) IS NULL               ";
    $query .= "               THEN 0                                              ";
    $query .= "               ELSE SUM(c.price * c.quantity)                      ";
    $query .= "               END                                     AS total    ";
    $query .= "        ,COUNT(c.product_id)                           AS cnt      ";
    $query .= "  FROM (                                                           ";
    $query .= "    SELECT  a.product_id                                           ";
    $query .= "           ,CASE WHEN a.sale_yn = 'Y'                              ";
    $query .= "                  THEN a.sale_price                                ";
    $query .= "                  ELSE price                                       ";
    $query .= "            END AS price                                           ";
    $query .= "           ,m.quantity                                             ";
    $query .= "    FROM cart AS m                                                 ";
    $query .= "      LEFT JOIN product AS a ON m.product_id = a.product_id        ";
    $query .= "    WHERE user_id = 1                                              ";
    $query .= "  ) AS c                                                           ";

    // echo "query===>$query";
    $rows = $this->db->select($query);
    
    foreach($rows as $row) {
      $result = $row;
    }

    return $result;
  }



  public function deleteProductInCart($user_id, $product_id) {
    $stmt = null;
    $result = "";
    $query = "";
    $query .= "  DELETE FROM cart         ";
    $query .= "  WHERE user_id    = ?     ";
    $query .= "    AND product_id = ?     ";

  	try {
  		$stmt = $this->db->prepare($query);
  		
    	/* The argument may be one of four types:
    		 i - integer 		d - double  		s - string  		b - BLOB  */
  		$stmt->bind_param("ii", $user_id, $product_id);
  		
  		$result = $stmt->execute();
  		
  		if($result) {
  		  $result = "success";
  		}

  	} catch(Exception $e) {
      throw $e;  	  
  	} finally {
      if(isset($stmt)) $stmt->close();
  	}
  	
  	return $result;
  }


  public function insertProductOrder($user_id) {
    $stmt = null;
    $result = "";
    $insertId = 0;
    $query = "";
    $query .= "  INSERT INTO product_order (            ";
    $query .= "    user_id, status, date_ordered        ";
    $query .= "  ) VALUES (                             ";
    $query .= "    ?, 'ordered', NOW()                  ";
    $query .= "  )                                      ";

  	try {
  		$stmt = $this->db->prepare($query);
  		
    	/* The argument may be one of four types:
    		 i - integer 		d - double  		s - string  		b - BLOB  */
  		$stmt->bind_param("i", $user_id);
  		
  		$result = $stmt->execute();
  		
  		if($result) {
  		  $insertId = $stmt->insert_id;
  		} else {
  		  return null;
  		}

  	} catch(Exception $e) {
      throw $e;  	  
  	} finally {
      if(isset($stmt)) $stmt->close();
  	}
  	
  	return $insertId;
  }



  public function insertProductOrderDetail($aryProducts) {
    $stmt = null;
    $result = "";
    $query = "";
    $affectedRows = 0;
    $query .= "  INSERT INTO product_order_detail (           ";
    $query .= "    order_id, product_id, quantity, price      ";
    $query .= "  ) VALUES (                                   ";
    $query .= "    ?, ?, ?, ?                                 ";
    $query .= "  )                                            ";

  	try {
  		$stmt = $this->db->prepare($query);

      foreach($aryProducts as $product) {
        $order_id = $product['order_id'];
        $product_id = $product['product_id'];
        $quantity = $product['quantity'];
        $price = $product['price'];
        
      	/* The argument may be one of four types:
      		 i - integer 		d - double  		s - string  		b - BLOB  */
    		$stmt->bind_param("iiid", $order_id, $product_id, $quantity, $price);
        
    		$result = $stmt->execute();
    		$affectedRows += $stmt->affected_rows;
      }
  		
  	} catch(Exception $e) {
      throw $e;  	  
  	} finally {
      if(isset($stmt)) $stmt->close();
  	}

    return $affectedRows;
  }




  public function updateProduct($aryProducts) {
    $stmt = null;
    $result = "";
    $affectedRows = 0;
    $query = "";
    $query .= "  UPDATE product SET                   ";
    $query .= "     sold_count = sold_count + ?       ";
    $query .= "    ,stock      = stock - ?            ";
    $query .= "  WHERE product_id = ?                 ";

  	try {
  		$stmt = $this->db->prepare($query);

      foreach($aryProducts as $product) {
        $product_id = $product['product_id'];
        $quantity = $product['quantity'];

      	/* The argument may be one of four types:
      		 i - integer 		d - double  		s - string  		b - BLOB  */
    		$stmt->bind_param("iii", $quantity, $quantity, $product_id);
        
    		$result = $stmt->execute();
    		$affectedRows += $stmt->affected_rows;
      }
  		
  	} catch(Exception $e) {
      throw $e;  	  
  	} finally {
      if(isset($stmt)) $stmt->close();
  	}

    return $affectedRows;
  }



  public function deleteProductsInCartAfterCheckout($aryProducts) {
    $stmt = null;
    $result = "";
    $affectedRows = 0;
    $query = "";
    $query .= "  DELETE FROM cart       ";
    $query .= "  WHERE user_id    = ?   ";
    $query .= "    AND product_id = ?   ";

  	try {
  		$stmt = $this->db->prepare($query);

      foreach($aryProducts as $product) {
        $user_id = $product['user_id'];
        $product_id = $product['product_id'];

      	/* The argument may be one of four types:
      		 i - integer 		d - double  		s - string  		b - BLOB  */
    		$stmt->bind_param("ii", $user_id, $product_id);
        
    		$result = $stmt->execute();
    		$affectedRows += $stmt->affected_rows;
      }
  		
  	} catch(Exception $e) {
      throw $e;  	  
  	} finally {
      if(isset($stmt)) $stmt->close();
  	}

    return $affectedRows;
  }




}

?>