<?php 
include_once 'config/Database.php';
include_once 'class/Customer.php';


$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);


if(!$customer->loggedIn()) {	
	header("Location: login.php");	
};
?>
<!DOCTYPE html>
<html>

    <head>
    <meta charset = "UTF-8">

    <title>sito la fortuna</title>
    
    <link rel="stylesheet" href="css/ristoratore.css">
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php
    $data = 'current_date()';
?>
<body>
    
    <section>

    <div class="logout"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></div>
    </section>

    <section>
        <h1>Resoconto Mensile</h1>
    <div class="content">
        <h3>Resoconto Giornaliero</h3>
    
        <form action="giorno.php" method="POST">
        <label>Scegli il giorno
            <input type="date" name="mydatetime">
        </label>
        <input type="submit" value="Invia">
        </form>
        
        <div class="Ordini">
            <div>
            <h3>Ordini di questo mese:</h3>
                <?php
                $sql = "SELECT order_id, customer ,sum(price*quantity) as Conto, order_date as Data FROM food_orders where month(order_date) = month($data) GROUP BY order_id ORDER by Data DESC";
                $result = $db->query($sql);

                if($result->num_rows > 0){
                    echo "<table class='styled-table'><thead><tr><th>ID Ordine</th><th>Cliente</th><th>Conto</th><th>Data</th><th class='dettagli'>Dettagli</th></tr></thead>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>" .$row["order_id"]."</td><td>".$row["customer"]."</td><td>".$row["Conto"]."</td><td>".$row["Data"]."</td><td class='dettagli'>";

                        $ordine = $row["order_id"];
                        $sql1 = "SELECT name , quantity FROM food_orders where order_id = $ordine";
                        $result1 = $db->query($sql1);
                        
                            while($row1 = $result1->fetch_assoc()){
                                echo $row1["name"]." x ".$row1["quantity"]." | ";
                                
                            }
                          

                        echo "</td></tr>";
                    }
                    echo "</table>";
                }
                else echo "0 results";
                ?>
            </div>
            
        </div>

        <div>
            <h3>Fatturato mensile:</h3>
                <?php
                $sql = "SELECT month(order_date) as Mese, sum(price*quantity) as Fatturato FROM food_orders where month(order_date) = month($data) GROUP BY month(order_date)";
                $result = $db->query($sql);

                if($result->num_rows > 0){
                    echo "<table class=styled-table><thead><tr><th>Mese</th><th>Fatturato</th></tr></thead>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>" .$row["Mese"]."</td><td>".$row["Fatturato"]."</td></tr>";
                    }
                    echo "</table>";
                }
                else echo "0 results";
                ?>
    
        </div>  
        
        <div>
            <h3>Registrazioni mensili:</h3>
                <?php
                $sql = "SELECT month(data_registrazione) as Mese, count(*) as Registrazioni FROM food_customer where month(data_registrazione) = month($data) group by month(data_registrazione)";
                $result = $db->query($sql);

                if($result->num_rows > 0){
                    echo "<table class=styled-table><thead><tr><th>Mese</th><th>Registrazioni</th></tr></thead>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>" .$row["Mese"]."</td><td>".$row["Registrazioni"]."</td></tr>";
                    }
                    echo "</table>";
                }
                else echo "0 results";
                ?>
    
        </div>   

    <div>   
    </section>

</body>
        <script>
            
        </script>
</html>