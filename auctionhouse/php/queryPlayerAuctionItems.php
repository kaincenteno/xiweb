<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/config/database.conf';

    session_start();
    $accountId = json_decode($_SESSION['chars_info'], true);
    $accountId = $accountId[0]['charid'];

    $category = array();
    $name = array();
    $stack = array();
    $listings = array();

    try {
        $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth  = $conn->prepare('
            SELECT
                ib.itemid,
                ib.aH,
                REPLACE(ib.name, "_", " ") AS "name",
                COUNT(*) AS "listings",
                (CASE WHEN ah.stack=1 THEN "Y" ELSE "N" END) as "stack"
            FROM item_basic ib
            INNER JOIN
                auction_house ah ON ib.itemid = ah.itemid
            WHERE ah.seller = :accountId
            GROUP BY ah.itemId, ah.stack
            ORDER BY ib.aH ASC, ib.itemId;');
        $sth->bindParam(':accountId', $accountId, PDO::PARAM_STR);
        $sth->execute();

        $i = 0;

        while ($row = $sth->fetch()) {
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
        error_log($name[0]);
        echo json_encode(array($category, $name, $stack, $listings));
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
