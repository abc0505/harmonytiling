<?php
include_once(CONFIG_PATH . 'db.php');

class CommonModel {
  
  public $db;
	
	public function __construct() {  
    $this->db = new Db();
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



}

?>