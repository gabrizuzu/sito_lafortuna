<?php 
include_once 'config/Database.php';
include_once 'class/Customer.php';
include_once 'class/Food.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);
$food = new Food($db);

if(!$customer->loggedIn()) {	
	header("Location: login.php");	
}
include('inc/header.php');
?>
<title>La fortuna</title>
  
<?php include('inc/container.php');?>
<div class="content">
	<div class="container-fluid">		
		<div class='row'>		
        	<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Benvenuto <?php echo $_SESSION["name"]; ?> </a></li>
			<li class="active" ><a href="delivery.php"><span class="glyphicon glyphicon-cutlery"></span> Menù </a></li>
			<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Ordine  (<?php

	 	 if(isset($_SESSION["cart"])){
	 	 $count = count($_SESSION["cart"]); 
	 	 echo "$count"; 
		}
	  	else
		echo "0";
	  	?>) </a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
  			</ul> 
		</div>
			<div class='row'>
			<?php 
			$result = $food->itemsList();
			$count=0;
			while ($item = $result->fetch_assoc()) { 
			if ($count == 0) {
				echo "<div class='row'>";
			}
			?>	
				<div class="col-md-3">
					<form method="post" action="cart.php?action=add&id=<?php echo $item["id"]; ?>">
						<div class="mypanel" text-align="center";>
							<img src="food/<?php echo $item["images"]; ?>" class="img-responsive">
							<h4 class="text-dark"><?php echo $item["name"]; ?></h4>
							<h5 class="text-info"><?php echo $item["description"]; ?></h5>
							<h5 class="text-danger">$ <?php echo $item["price"]; ?>/-</h5>
							<h5 class="text-info">Quantità: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
							<input type="hidden" name="item_name" value="<?php echo $item["name"]; ?>">
							<input type="hidden" name="item_price" value="<?php echo $item["price"]; ?>">
							<input type="hidden" name="item_id" value="<?php echo $item["id"]; ?>">
							<input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Scegli">
						</div>
					</form>    
				</div>

			<?php 
			$count++;
			if($count==4)
			{
			  echo "</div>";
			  $count=0;
			}
			} 
			?>
			</div>
    </div>
</div>        
		
<?php include('inc/footer.php');?>

