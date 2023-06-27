<?php 
include_once 'config/Database.php';
include_once 'class/Customer.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);

if($customer->loggedIn()) {	
	if($customer->email == "admin"){
		header("Location: ristoratore.php");
	}
	else
	header("Location: delivery.php");	
}

$loginMessage = '';
if(!empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {	
	$customer->email = $_POST["email"];
	$customer->password = $_POST["password"];	

	if($customer->login()) {
		echo "prova";
		if($customer->email == "admin"){
			header("Location: ristoratore.php");
		}
		else
		header("Location: delivery.php");	
	} else {
		$loginMessage = 'Login sbagliato. Riprova';
	}
} else {
	$loginMessage = 'Riempi tutti i campi';
}
include('inc/header.php');
?>
<title>La fortuna</title>
<?php include('inc/container.php');?>
<div class="content"> 
			<div>
				<?php if ($loginMessage != '') { ?>
					<div class="alert"><?php echo $loginMessage; ?></div>                            
				<?php } ?>

				<form class="form" method="POST" action=""> 
					<label for="email"> Email: </label> 
					<div>                               
						<input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($_POST["email"])) { echo $_POST["email"]; } ?>" placeholder="email" required>                                        
					</div>           
					<label for="password"> Password: </label> 
					<div>
						<input type="password" class="form-control" id="password" name="password" value="<?php if(!empty($_POST["password"])) { echo $_POST["password"]; } ?>" placeholder="password" required>
					</div>						
					
					<div> 
						  <input type="submit" value="Login" class="button" id="login" name="login">						  			
					</div>					
					<p>Non hai un account? <a href="register.php">Registrati</a></p>
				</form>  
				
			</div>                     
		</div>  
	</div>       
    </div>        
</body>
</html>
