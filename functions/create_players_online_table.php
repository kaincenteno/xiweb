<?php 
function create_players_online_table()
{
    include 'config/database.conf';
    include 'globals/flagID.php';
    include 'globals/jobID.php';
    include 'globals/partyFlag.php';
    
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
    }
    
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
    // Table is being created here
    echo "<table class='charactersonline'><tr><th>Character Name</th><th>Zone</th><th>Main Job</th><th>Sub Job</th></tr>";
    for ($x = 0; $x < $i ; $x+=1){
        $mainJob = $jobID[$charMainJob[$x]];
        $subJob = $jobID[$charSubJob[$x]];
        if ( !($charFlags[$x] & $flagID["FLAG_ANON"])){
            if ($charPartyFlag[$x] & ($partyFlag["PARTY_LEADER"] | $partyFlag["ALLIANCE_LEADER"])) {
                if ($charSubLevel[$x] != 0) {
                    echo "<tr><td style='color:goldenrod'>$charName[$x]</td><td>$charZoneName[$x]</td><td>$charMainLevel[$x] $mainJob</td><td>$charSubLevel[$x] $subJob</td></tr>";
                } else {
                    echo "<tr><td style='color:goldenrod'>$charName[$x]</td><td>$charZoneName[$x]</td><td>$charMainLevel[$x] $mainJob</td><td></td></tr>";
                }
            } elseif ($charPartyFlag[$x] & ($partyFlag["PARTY_FIRST"] | $partyFlag["PARTY_SECOND"] | $partyFlag["PARTY_THIRD"])){
                if ($charSubLevel[$x] != 0){
                    echo "<tr><td style='color:blue'>$charName[$x]</td><td>$charZoneName[$x]</td><td>$charMainLevel[$x] $mainJob</td><td>$charSubLevel[$x] $subJob</td></tr>";
                } else {
                    echo "<tr><td style='color:blue'>$charName[$x]</td><td>$charZoneName[$x]</td><td>$charMainLevel[$x] $mainJob</td><td></td></tr>";
                }
            } else {
                if ($charSubLevel[$x] != 0){
                    echo "<tr><td style='color:black'>$charName[$x]</td><td>$charZoneName[$x]</td><td>$charMainLevel[$x] $mainJob</td><td>$charSubLevel[$x] $subJob</td></tr>";
                } else {
                    echo "<tr><td style='color:black'>$charName[$x]</td><td>$charZoneName[$x]</td><td>$charMainLevel[$x] $mainJob</td><td></td></tr>";
                }
            }
        } else {
            echo "<tr><td style='color:black'>$charName[$x]</td><td>$charZoneName[$x]</td><td></td><td></tr>";
        }
    }
    echo "</table>";
}
?>