<?php
class Customer {	
   
	private $customerTable = 'food_customer';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function register(){

		if($this->email && $this->password && $this->name && $this->phone && $this->address){
			$sqlQuery = "
				SELECT * FROM ".$this->customerTable." 
				WHERE email = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("s", $this->email);	
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){	
				return 0;			
			} //caso email già presente

			$password = md5($this->password);
			$data = date('Y-m-d');
			$sql= "INSERT INTO food_customer(name, email, password, phone, address, data_registrazione) VALUES ('$this->name','$this->email', '$password','$this->phone' ,'$this->address','$data')";
			if($this->conn->query($sql) === true){
				return 1;
			}else{
				return 0;
			}
		}
		else return 0;
	}
	
	
	
	public function login(){
		if($this->email && $this->password) {
			$sqlQuery = "
				SELECT * FROM ".$this->customerTable." 
				WHERE email = ? AND password = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$password = md5($this->password);
			$stmt->bind_param("ss", $this->email, $password);	
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				$user = $result->fetch_assoc();
				$_SESSION["userid"] = $user['id'];				
				$_SESSION["name"] = $user['name'];					
				return 1;		
			} else {
				return 0;		
			}			
		} else {
			return 0;
		}
	}
	
	public function loggedIn (){
		if(!empty($_SESSION["userid"])) {
			return 1;
		} else {
			return 0;
		}
	}
	
	function getAddress(){
		if($_SESSION["userid"]) {
			$stmt = $this->conn->prepare("
				SELECT email, phone, address 
				FROM ".$this->customerTable." 
				WHERE id = '".$_SESSION["userid"]."'");				
			$stmt->execute();			
			$result = $stmt->get_result();		
			return $result;	
		}
	}
}
?>