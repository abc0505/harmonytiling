<?php
include_once(CONFIG_PATH . 'db.php');

class Model {
  
  public $db;
	
	public function __construct() {  
    $this->db = new Db();
	} 
	
  
  public function selectGadgetList($category, $orderby, $show_yn, $searchWord) {
    $rows = null;
    $query = "";
    $query .= "  SELECT *                       ";
    $query .= "  FROM product                   ";
    $query .= "  WHERE 1=1                      ";
    if($category != "") {
      $categories = explode(",", $category);
      $query .= "    AND (                                 ";
      for($i=0; $i<count($categories); $i++) {
        if($i > 0) {
          $query .= "       OR                             ";
        }
        $query .= "         category_id = $categories[$i]  ";
      }
      $query .= "        )                                 ";
    }
    if($show_yn != "") {
      $query .= "    AND show_yn  = '$show_yn'    ";
    }
    if($searchWord != "") {
      $query .= "    AND (product_name like '%$searchWord%' OR short_description like '%$searchWord%' OR description like '%$searchWord%')  ";
    }

    if($orderby != "") {  
      $query .= "  ORDER BY ". $this->getOrderbyQuery($orderby) ."   ";
    }

    // echo "query===>$query";
    $rows = $this->db->select($query);

    return $rows;
  }
  
  
  public function selectSaleList($category) {
    $rows = null;
    $query = "";
    $query .= "  SELECT *                           ";
    $query .= "  FROM product                       ";
    $query .= "  WHERE show_yn  = 'Y'               ";
    $query .= "    AND sale_yn  = 'Y'               ";

    if($category != "") {
      $query .= "    AND category_id = $category      ";
    }
    
    $query .= "  ORDER BY date_created DESC         ";

    $rows = $this->db->select($query);

    return $rows;
  }





  public function selectNewItemList($category) {
    $rows = null;
    $query = "";
    $query .= "  SELECT *                           ";
    $query .= "  FROM product                       ";
    $query .= "  WHERE show_yn  = 'Y'               ";

    if($category != "") {
      $query .= "    AND category_id = $category      ";
    }
    
    $query .= "  ORDER BY date_created DESC, product_id DESC    ";
    // $query .= "  LIMIT 20                           ";

    $rows = $this->db->select($query);

    return $rows;
  }




  public function selectTop50List($category) {
    $rows = null;
    $query = "";
    $query .= "  SELECT *                           ";
    $query .= "  FROM product                       ";
    $query .= "  WHERE show_yn  = 'Y'               ";

    if($category != "") {
      $query .= "    AND category_id = $category      ";
    }
    
    $query .= "  ORDER BY sold_count DESC           ";
    $query .= "  LIMIT 50                           ";

    $rows = $this->db->select($query);

    return $rows;
  }



  public function selectGadgetDetail($productId) {
    $result = null;
    $query = "";
    $query .= "  SELECT *                       ";
    $query .= "  FROM product                   ";
    $query .= "  WHERE product_id = $productId  ";
    
    // echo "query===>$query";
    $rows = $this->db->select($query);
    
    foreach($rows as $row) {
      $result = $row;
    }

    return $result;
  }




  public function selectCategoryList() {
    $rows = null;
    $query = "";
    $query .= "  SELECT *                       ";
    $query .= "  FROM category                  ";
    $query .= "  ORDER BY sort_order            ";

    $rows = $this->db->select($query);

    return $rows;
  }


  public function selectOrderbyList() {
    $rows[0] = array("name"=>"Newest Arrivals", "value"=>"1");
    $rows[1] = array("name"=>"Price Low to High", "value"=>"2");
    $rows[2] = array("name"=>"Price High to Low", "value"=>"3");
    $rows[3] = array("name"=>"Product Name", "value"=>"4");

    return $rows;
  }


  public function getOrderbyQuery($orderby) {
    $str = "";
    if($orderby == "1") {
      $str = "date_created DESC";
    } else if($orderby == "2") {
      $str = "sale_price";
    } else if($orderby == "3") {
      $str = "sale_price DESC";
    } else if($orderby == "4") {
      $str = "product_name";
    }
    return $str;
  }

  
  
  public function insertCart($user_id, $product_id, $order_quantity) {
    $stmt = null;
    $result = "";
    $query = "";
    $query .= "  INSERT INTO cart (                                     ";
    $query .= "    user_id, product_id, quantity, date_created          ";
    $query .= "  ) VALUES (                                             ";
    $query .= "    ?,?,?, NOW()                                         ";
    $query .= "  )                                                      ";

  	try {
  		$stmt = $this->db->prepare($query);
  		
    	/* The argument may be one of four types:
    		 i - integer 		d - double  		s - string  		b - BLOB  */
  		$stmt->bind_param("iii", $user_id, $product_id, $order_quantity);
  		
  		$result = $stmt->execute();
  		if($result) {
  		  $result = "success";
  		} else {
        if($this->db->errno() === 1062) {  // Duplicate entry
          $result = "duplicate";
        }
  		}

  	} catch(Exception $e) {
      throw $e;  	  
  	} finally {
      if(isset($stmt)) $stmt->close();
  	}
  	
  	return $result;
  }


}

?>