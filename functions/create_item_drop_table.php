<?php 
function create_item_drop_table() 
{
    require 'config/database.conf';
    
    $item_name = array();
    $drop_rate = array();
    $mob_name = array();
    $zone_name = array();
    
    try {
        $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $queryItems  = $conn->query('
            SELECT
                REPLACE(ib.name, "_", " ") AS "item_name",
                CONCAT(md.itemRate * 0.1, "%") AS "drop_rate",
                REPLACE(mg.name, "_", " ") AS "mob_name",
                REPLACE(zs.name,"_"," ") AS "zone_name"
            FROM  mob_droplist md
            INNER JOIN 
                item_basic ib ON md.itemId = ib.itemid
            INNER JOIN
                mob_groups mg ON md.dropId = mg.dropid
            INNER JOIN
                zone_settings zs ON zs.zoneid = mg.zoneid
            ORDER BY zone_name, mob_name, item_name ASC;');
        $i = 0;
        while ($row = $queryItems->fetch()){
            $item_name[$i] = $row["item_name"];
            $drop_rate[$i] = $row["drop_rate"];
            $mob_name[$i] = $row["mob_name"];
            $zone_name[$i] = $row["zone_name"];
            $i = $i + 1;
        }
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
    // Table is being created here
    echo "<table class='plaintable'><tr><th>Item</th><th>Drop Rate</th><th>Mob</th><th>Zone</th></tr>";
    for ($x = 0; $x < $i ; $x+=1){
        echo "<tr><td>$item_name[$x]</td><td>$drop_rate[$x]</td><td>$mob_name[$x]</td><td>$zone_name[$x]</td></tr>";
    }
    echo "</table>";
}
?>
