<?php
    include_once 'config/Database.php';
    include_once 'class/Customer.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $customer = new Customer($db);
    
    if($customer->loggedIn()) {	
        header("Location: delivery.php");	

    }
    $registerMessage = '';
    if(!empty($_POST["invia"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["checkpassword"]) && !empty($_POST["phone"]) && !empty($_POST["address"]) && !empty($_POST["password"])) {	
        
        $customer->email = $_POST["email"];
        $customer->name = $_POST["name"];
        $customer->password = $_POST["password"];
        $customer->phone = $_POST["phone"];
        $customer->address = $_POST["address"];

        if($_POST["checkpassword"]!=($_POST["password"])){
            $registerMessage = 'Le password sono diverse';
        }
        else if($customer->register()) {
            header("Location: login.php");	
        } else {
            $registerMessage = 'registrazione non avvenuta con successo. Riprova';
        }
    } else {
        $registerMessage = 'Riempi tutti i campi';
    }

    include('inc/header.php');
?>
<title>La fortuna</title>
<?php include('inc/container.php');?>
<div class="content">
    <div>
    <?php if ($registerMessage != '') { ?>
					<div class="alert"><?php echo $registerMessage; ?></div>                            
				<?php } ?>
    <form id="registerform" method="POST" action="">
        <h2>Registrati</h2>
        <label for="email">Email</label>
        <div>
        <input type="email" name="email" id="email" required>
        </div>

        <label for="username">Nome</label>
        <div>
        <input type="text" name="name" id="name" required>
        </div>

        <label for="password">Password</label>
        <div>
        <input type="password" name="password" id="password" required>
        </div>

        <label for="checkpassword">Conferma Password</label>
        <div>
        <input type="password" name="checkpassword" id="checkpassword" required>
        </div>

        <label for="phone">Phone</label>
        <div>
        <input type="text" name="phone" id="phone" required>
        </div>

        <label for="password">Address</label>
        <div>
        <input type="textarea" name="address" id="address" required>
        </div>
        
        <input type="submit" value="invia" name="invia" class="button"> 
        <p>Hai già un account? <a href="login.php">Accedi</a></p>
    </form>
    </div>
    </div>
</div>

</body>
</html>