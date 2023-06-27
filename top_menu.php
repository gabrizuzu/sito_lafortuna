<?php

  ?>
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
<?php        

?>