<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
use config\database;

$itemName = array();
$dropType = array();
$dropRate = array();
$poolId = array();
$zoneName = array();
$itemNameLike = "%" . $_GET["itemName"] . "%";

try {
    $conn = new PDO(
        "mysql:host=" . config\database\DBSERVER . "; dbname=" . config\database\DBNAME,
        config\database\DBUSER,
        config\database\DBPASS
    );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $queryItems  = $conn->prepare('
        SELECT
            REPLACE(ib.name, "_", " ") AS "name",
            md.dropType,
            md.itemRate AS "drop_rate",
            mg.poolid,
            mg.zoneid
        FROM  mob_droplist md
        INNER JOIN
            mob_groups mg ON md.dropId = mg.dropid
        INNER JOIN
            item_basic ib ON md.itemId = ib.itemid
        WHERE
            ib.name LIKE :itemNameLike
        ORDER BY mg.zoneid, mg.poolid, ib.name ASC;');
    $queryItems->bindParam(":itemNameLike", $itemNameLike, PDO::PARAM_STR);
    $queryItems->execute();

    $i = 0;
    while ($row = $queryItems->fetch()) {
        $itemName[$i] = $row["name"];
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

    echo json_encode(array($itemName, $dropType, $dropRate, $poolId, $zoneName));
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
