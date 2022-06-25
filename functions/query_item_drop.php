<?php 
function query_item_drop(){
    require 'config/database.conf';
        
    $item_id = array();
    $drop_type = array();
    $drop_rate = array();
    $pool_id = array();
    $zone_name = array();

    try {
        $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $queryItems  = $conn->query('
            SELECT
                md.itemId,
                md.dropType,
                md.itemRate AS "drop_rate",
                mg.poolid,
                mg.zoneid
            FROM  mob_droplist md
            INNER JOIN
                mob_groups mg ON md.dropId = mg.dropid
            ORDER BY mg.zoneid, mg.poolid, itemId ASC;');
        $i = 0;
        while ($row = $queryItems->fetch()){
            $item_id[$i] = $row["itemId"];
            $drop_type[$i] = $row["dropType"];
            if ($row["drop_rate"] == 0) {
                $drop_rate[$i] = 'N/A';
            } else {
                $drop_rate[$i] = $row["drop_rate"] * 0.1 . '%';
            }
            $pool_id[$i] = $row["poolid"];
            $zone_name[$i] = $row["zoneid"];
            $i = $i + 1;
        }

        return array($item_id, $drop_type, $drop_rate, $pool_id, $zone_name);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
