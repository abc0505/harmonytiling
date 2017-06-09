<?php
include_once(CONFIG_PATH . 'db.php');

class Model {
  
  public $db;
	
	public function __construct() {  
    $this->db = new Db();
	} 
	
  
  public function selectOfferList() {
    $rows = null;
    $query = "";
    $query .= "  SELECT *               ";
    $query .= "  FROM product           ";
    $query .= "  WHERE offer_yn = 'Y'   ";

    $rows = $this->db->select($query);

    return $rows;
  }
  


}

?>