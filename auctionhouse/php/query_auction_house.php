<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
    use config\database;

    $category = array();
    $name = array();
    $stack = array();
    $listings = array();
    $itemName = "%" . $_GET["itemName"] . "%";

    try {
        $conn = new PDO(
            "mysql:host=" . config\database\DBSERVER . "; dbname=" . config\database\DBNAME,
            config\database\DBUSER,
            config\database\DBPASS
        );
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $queryAH  = $conn->prepare('
            SELECT
                ib.itemid,
                ib.aH,
                REPLACE(ib.name, "_", " ") AS "name",
                COUNT(*) AS "listings",
                (CASE WHEN ah.stack=1 THEN "Y" ELSE "N" END) as "stack"
            FROM item_basic ib
            INNER JOIN
                auction_house ah ON ib.itemid = ah.itemid
            WHERE
                ah.buyer_name IS NULL AND
                ib.name LIKE :itemName
            GROUP BY ah.itemId, ah.stack
            ORDER BY ib.aH ASC, ib.itemId;');
        $queryAH->bindParam(":itemName", $itemName, PDO::PARAM_STR);
        $queryAH->execute();

        $i = 0;
        while ($row = $queryAH->fetch()) {
            if ($row["aH"] == 0) {
                error_log(
                    "Item {$row["name"]} (itemid {$row["itemid"]}) doesnt have a valid category in globals/ahID.php",
                    0
                );
            } else {
                $category[$i] = $row["aH"];
                $name[$i] = $row["name"];
                $stack[$i] = $row["stack"];
                $listings[$i] = $row["listings"];
                $i = $i + 1;
            }
        }

        echo json_encode(array($category, $name, $stack, $listings));
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

