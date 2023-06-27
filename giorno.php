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
<body>
    <?php
    $data = $_POST['mydatetime'];
    ?>
    <section>

    <div class="logout"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></div>
    </section>

    <section>
        <h2><a href="ristoratore.php">Clicca per tornare al Resoconto</a></h2>
    <div class="content">
        <h4>Resoconto del giorno <?php echo $data?></h4>
    
        
        
        <div>
            <h3>Ordini del giorno:</h3>
            <?php
                $sql = "SELECT order_id, customer ,sum(price*quantity) as Conto, order_date as Data FROM food_orders where order_date = '$data' GROUP BY order_id ORDER by Data DESC";
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

        <div>
            <h3>Fatturato giornaliero:</h3>
                <?php
                $sql = "SELECT order_date as Data, sum(price*quantity) as Fatturato FROM food_orders where order_date = '$data' GROUP BY order_date";
                $result = $db->query($sql);

                if($result->num_rows > 0){
                    echo "<table class=styled-table><thead><tr><th>Data</th><th>Fatturato</th></tr></thead>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>" .$row["Data"]."</td><td>".$row["Fatturato"]."</td></tr>";
                    }
                    echo "</table>";
                }
                else echo "0 results";
                ?>
    
        </div>  
        
        <div>
            <h3>Registrazioni giornaliere:</h3>
                <?php
                $sql = "SELECT data_registrazione as Data, count(*) as Registrazioni FROM food_customer where data_registrazione = '$data' group by data_registrazione";
                $result = $db->query($sql);

                if($result->num_rows > 0){
                    echo "<table class=styled-table><thead><tr><th>Data</th><th>Registrazioni</th></tr></thead>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>" .$row["Data"]."</td><td>".$row["Registrazioni"]."</td></tr>";
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