<?php

// class Book {
// 	public $title;
// 	public $author;
// 	public $description;
	
// 	public function __construct($title, $author, $description)  
//     {  
//         $this->title = $title;
// 	    $this->author = $author;
// 	    $this->description = $description;
//     } 
// }

include_once(ROOT . DS . 'config' . DS  . 'db.php');

class Model {
  
  public $db;
	
	public function __construct() {  
		// $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  //   if (mysqli_connect_errno()) {
  //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
  //   }
    
    $this->db = new Db();
    
	} 
	
  
  public function getList() {
    if(!$this->conn) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      return;      
    }
    
    $query = "SELECT * FROM products";

    $result = $this->conn->query($query);
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $description = $row['description'];
            $stock_qty = $row['stock_qty'];
            $image_url = $row['image'];
            
            echo "<h3>$name</h3>
                  <img src='images/$image_url' width='250px'/>
                  <p>Price = $price, Quantity = $stock_qty</p>
                  <a href='detail.php?id=$id'>Detail</a>";

        }
    
    }

    
    
  }
  
  
	public function getBookList()
	{
		// here goes some hardcoded values to simulate the database
		return array(
			"Jungle Book" => new Book("Jungle Book", "R. Kipling", "A classic book."),
			"Moonwalker" => new Book("Moonwalker", "J. Walker", ""),
			"PHP for Dummies" => new Book("PHP for Dummies", "Some Smart Guy", "")
		);
	}
	
	public function getBook($title)
	{
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allBooks = $this->getBookList();
		return $allBooks[$title];
	}
	
	
}

?>