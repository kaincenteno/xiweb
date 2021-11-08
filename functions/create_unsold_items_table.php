<?php 
function create_unsold_items_table() 
{
    require 'config/database.conf';
    require 'globals/ahID.php';
    
    $aH = array();
    $name = array();
    $stack = array();
    
    try {
        $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $queryAH  = $conn->query('
            SELECT
                DISTINCT ib.aH,
                REPLACE(ib.name, "_", " ") AS name,
                ah.stack
            FROM auction_house ah
            INNER JOIN item_basic ib ON ah.itemid = ib.itemid
            WHERE ah.buyer_name IS NULL
            ORDER BY ib.aH ASC;');
        $i = 0;
        while ($row = $queryAH->fetch()){
            $aH[$i] = $row["aH"];
            $name[$i] = $row["name"];
            $stack[$i] = $row["stack"];
            $i = $i + 1;
        }
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
    // Table is being created here
    echo "<table class='unsoldtable'><tr><th>Category</th><th>Name</th><th>Is a stack?</th></tr>";
    for ($x = 0; $x < $i ; $x+=1){
        echo "<tr><td>" . $ahID[$aH[$x]] . "</td><td>$name[$x]</td><td>$stack[$x]</td></tr>";
    }
    echo "</table>";
}
?>