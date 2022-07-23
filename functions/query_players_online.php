<?php 
function query_players_online()
{
    include 'config/database.conf';
    
    $charId = array();
    $charName = array();
    $charNation = array();
    $charMainJob = array();
    $charMainLevel = array();
    $charSubJob = array();
    $charSubLevel = array();
    $charZoneName = array();
    $charFlags = array();
    $charPartyFlag = array();
    
    // Information is being read from database
    try {
        $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
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
            $charId[$i] = $accountsSessionsRow['charid'];
            $charName[$i] = $accountsSessionsRow['charname'];
            $charNation[$i] = $accountsSessionsRow['nation'];
            $charMainJob[$i] = $accountsSessionsRow['mjob'];
            $charMainLevel[$i] = $accountsSessionsRow['mlvl'];
            $charSubJob[$i] = $accountsSessionsRow['sjob'];
            $charSubLevel[$i] = $accountsSessionsRow['slvl'];
            $charZoneName[$i] = $accountsSessionsRow['zonename'];
            $charFlags[$i] = $accountsSessionsRow['nameflags'];
            $charPartyFlag[$i] = $accountsSessionsRow['partyflag'];
            $i = $i + 1;
        }

        return array($charId, $charName, $charNation, $charMainJob, $charMainLevel, $charSubJob, $charSubLevel, $charZoneName, $charFlags, $charPartyFlag);
    }
    
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
