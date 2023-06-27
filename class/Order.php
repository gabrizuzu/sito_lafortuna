<?php
class Order {	
   
	private $ordersTable = 'food_orders';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function insert(){		
		if($this->item_name) {
			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->ordersTable."(`item_id`, `name`, `price`, `quantity`, `order_date`, `order_id`, `customer`)
			VALUES(?,?,?,?,?,?,?)");		
			$this->item_id = htmlspecialchars(strip_tags($this->item_id));
			$this->item_name = htmlspecialchars(strip_tags($this->item_name));
			$this->item_price = htmlspecialchars(strip_tags($this->item_price));
			$this->quantity = htmlspecialchars(strip_tags($this->quantity));
			$this->order_date = htmlspecialchars(strip_tags($this->order_date));
			$this->order_id = htmlspecialchars(strip_tags($this->order_id));
			$this->customer = htmlspecialchars(strip_tags($this->customer));

			$stmt->bind_param("isiisss", $this->item_id, $this->item_name, $this->item_price, $this->quantity, $this->order_date, $this->order_id, $this->customer);			
			if($stmt->execute()){
				return true;
			}		
		}
	}	
}
?>