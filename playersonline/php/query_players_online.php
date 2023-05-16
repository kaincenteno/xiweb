<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
use config\database;

function query_players_online()
{
    $playersOnline = array();
    
    // Information is being read from database
    try {
        $conn = new PDO(
            "mysql:host=" . config\database\DBSERVER . "; dbname=" . config\database\DBNAME,
            config\database\DBUSER,
            config\database\DBPASS
        );
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $getAccountsSessions  = $conn->query('
            SELECT
                c.charid,
                c.charname,
                c.nation,
                REPLACE(z.name, "_", " ") zonename,
                s.mjob,
                s.mlvl,
                s.sjob,
                s.slvl,
                s.nameflags,
                a.partyflag
            FROM chars c
            LEFT JOIN zone_settings z ON z.zoneid = c.pos_zone
            INNER JOIN char_stats s ON s.charid = c.charid
            LEFT JOIN accounts_parties a ON a.charid = c.charid
            WHERE c.charid = ANY(SELECT charid FROM accounts_sessions);');
        $i = 0;
        while ($accountsSessionsRow = $getAccountsSessions->fetch()){
            $playersOnline[$i] = array(
                "charid" => $accountsSessionsRow['charid'],
                "charname" => $accountsSessionsRow['charname'],
                "nation" => $accountsSessionsRow['nation'],
                "mjob" => $accountsSessionsRow['mjob'],
                "mlvl" => $accountsSessionsRow['mlvl'],
                "sjob" => $accountsSessionsRow['sjob'],
                "slvl" => $accountsSessionsRow['slvl'],
                "zonename" => $accountsSessionsRow['zonename'],
                "nameflags" => $accountsSessionsRow['nameflags'],
                "partyflags" => $accountsSessionsRow['partyflag'],
            );

            $i += 1;
        }

        return $playersOnline;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
