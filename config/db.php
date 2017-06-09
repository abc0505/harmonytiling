<?php 
/**
 * Database wrapper for a MySQL with PHP tutorial
 * 
 * @copyright Eran Galperin
 * @license MIT License
 * @see http://www.binpress.com/tutorial/using-php-with-mysql-the-right-way/17
 */
class Db {
	// The database connection
	protected $conn;
	
	/**
	 * Connect to the database
	 * 
	 * @return bool false on failure / mysqli MySQLi object instance on success
	 */
	public function connect() {
		
		// Try and connect to the database
		$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return false;
		}

	}

	
	public function autocommit($isAutoCommit) {
		$this->conn->autocommit($isAutoCommit);
	}
	

	public function commit() {
		$this->conn->commit();
	}
	
	
	public function rollback() {
		$this->conn->rollback();
	}
	
	/**
	 * Query the database
	 *
	 * @param $query The query string
	 * @return mixed The result of the mysqli::query() function
	 */
	public function query($query) {

		try {
			$result = $this->conn->query($query);
		} catch(Exception $e) {
			throw $e;			
		}
		
		return $result;
	}
	
	
	/**
	 * Fetch rows from the database (SELECT query)
	 *
	 * @param $query The query string
	 * @return bool False on failure / array Database rows on success
	 */
	public function select($query) {
		$rows = array();
		
		try {
			$result = $this->conn->query($query);
			
			if(!$result) {
				throw new Exception($this->conn->error);
			}
			
			while ($row = $result -> fetch_assoc()) {
				$rows[] = $row;
			}
			
			// echo $query;
		} catch(Exception $e) {
			echo $query;
			throw $e;
		}

		return $rows;
	}
	
	public function prepare($query) {
		return $this->conn->prepare($query);
	}
	
	
	/**
	 * Fetch the last error from the database
	 * 
	 * @return string Database error message
	 */
	public function error() {
		return $this->conn->error;
	}

	public function errno() {
		return $this->conn->errno;
	}
	
	
	public function close() {
		$this->conn->close();
	}
	
	
	public function getInsertId() {
		$this->conn->insert_id;
	}
	

	/**
	 * Quote and escape value for use in a database query
	 *
	 * @param string $value The value to be quoted and escaped
	 * @return string The quoted and escaped string
	 */
	public function quote($value) {
		$connection = $this -> connect();
		return "'" . $connection -> real_escape_string($value) . "'";
	}
}

?>