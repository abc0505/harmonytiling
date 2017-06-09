<?php
include_once(CONFIG_PATH . 'db.php');

class Model {
  
  public $db;
	
	public function __construct() {  
    $this->db = new Db();
	} 
	
  
  public function selectUser($email, $password) {
    $rows = null;
    $query = "";
    $query .= "  SELECT *                                  ";
    $query .= "  FROM user                                 ";
    $query .= "  WHERE email         = '". $email ."'      ";
    $query .= "    AND user_password = '". $password ."'   ";

    $rows = $this->db->select($query);

    return $rows;
  }
  

}

?>