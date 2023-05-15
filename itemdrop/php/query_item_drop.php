<?php
function query_item_drop(){
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.conf';
        
    $itemId = array();
    $dropType = array();
    $dropRate = array();
    $poolId = array();
    $zoneName = array();

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
        while ($row = $queryItems->fetch()) {
            $itemId[$i] = $row["itemId"];
            $dropType[$i] = $row["dropType"];
            if ($row["drop_rate"] == 0) {
                $dropRate[$i] = 'N/A';
            } else {
                $dropRate[$i] = $row["drop_rate"] * 0.1 . '%';
            }
            $poolId[$i] = $row["poolid"];
            $zoneName[$i] = $row["zoneid"];
            $i = $i + 1;
        }

        return array($itemId, $dropType, $dropRate, $poolId, $zoneName);
    } catch (PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}
