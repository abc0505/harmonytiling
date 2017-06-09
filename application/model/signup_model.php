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
    
    if(isset($password)) {
      $query .= "    AND user_password = '". $password ."'   ";
    }

    $rows = $this->db->select($query);

    return $rows;
  }


  
  public function insertUser($user_first_name, $user_last_name, $user_password, $email, $address, $suburb, $state, $zipcode) {

    $stmt = null;
    $result = "";
    $query = "";
    $query .= "  INSERT INTO user (                                                                          ";
    $query .= "    user_first_name, user_last_name, user_password, email, address, suburb, state, zipcode    ";
    $query .= "  ) VALUES (                                                                                  ";
    $query .= "    ?,?,?,?,?,?,?,?                                                                           ";
    $query .= "  )                                                                                           ";

  	try {
  		$stmt = $this->db->prepare($query);
  		
    	/* The argument may be one of four types:
    		 i - integer 		d - double  		s - string  		b - BLOB  */
  		$stmt->bind_param("ssssssss", $user_first_name, $user_last_name, $user_password, $email, $address, $suburb, $state, $zipcode);
  		
  		$result = $stmt->execute();
  		if(!$result) {
  		  echo "$result <br>";
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