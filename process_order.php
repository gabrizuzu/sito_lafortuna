<?php 
include_once 'config/Database.php';
include_once 'class/Customer.php';
include_once 'class/Order.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);
$order = new Order($db);

if(!$customer->loggedIn()) {	
	header("Location: login.php");	
}
include('inc/header.php');
?>
<title>La fortuna</title>
  <link rel="stylesheet" type = "text/css" href ="css/foods.css">
<?php include('inc/container.php');?>
<div class="content">
	<div class="container-fluid">	
		<div class='row'>
			<?php if(!empty($_GET['order'])) {			
				$total = 0;
				$orderDate = date('Y-m-d');
				if(isset($_SESSION["cart"])) {
					foreach($_SESSION["cart"] as $keys => $values){					
						$order->item_id = $values["item_id"];
						$order->item_name = $values["item_name"];
						$order->item_price = $values["item_price"];
						$order->quantity = $values["item_quantity"];
						$order->order_date = $orderDate;
						$order->order_id = $_GET['order'];
						$order->customer = $_SESSION['userid'];
						$order->insert();
					}
					unset($_SESSION["cart"]);	
				}				
			?>
				<div class="container">
					<div class="jumbotron">
						<h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span>Ordinazione effettuata con successo!!! </h1>
					</div>
				</div>
				<br>
				<h2 class="text-center"> Ordinazione effettuata con successo!!!</h2>
				
				<h3 class="text-center"> <strong>Codice Ordine:</strong> <span style="color: blue;"><?php echo $_GET['order']; ?></span> </h3>
				
				<h3 class="text-center">Ritorna al <a href="delivery.php">Menu!</a></h3>
			<?php } else { ?>
				<h3 class="text-center">Ritorna al <a href="delivery.php">Menu!</a></h3>
			<?php } ?>	 
		</div>	  
    </div>	
<?php include('inc/footer.php');?>
