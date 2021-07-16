<?php
include 'config/database.conf';

$uptime = shell_exec("uptime -p | cut -c4-");

header("Refresh: 120");
$jobID = array(
 0 => "",
 1 => "WAR",
 2 => "MNK",
 3 => "WHM",
 4 => "BLM",
 5 => "RDM",
 6 => "THF",
 7 => "PLD",
 8 => "DRK",
 9 => "BST",
10 => "BRD",
11 => "RNG",
12 => "SAM",
13 => "NIN",
14 => "DRG",
15 => "SMN",
16 => "BLU",
17 => "COR",
18 => "PUP",
19 => "DNC",
20 => "SCH",
21 => "GEO",
22 => "RUN"
);

$flagID = array(
"FLAG_INEVENT"     => 2,
"FLAG_CHOCOBO"     => 64,
"FLAG_WALLHACK"    => 512,
"FLAG_INVITE"      => 2048,
"FLAG_ANON"        => 4096,
"FLAG_UNKNOWN"     => 8192,
"FLAG_AWAY"        => 16384,
"FLAG_PLAYONLINE"  => 65536,
"FLAG_LINKSHELL"   => 131072,
"FLAG_DC"          => 262144,
"FLAG_GM"          => 67108864,
"FLAG_GM_SUPPORT"  => 67108864,
"FLAG_GM_SENIOR"   => 83886080,
"FLAG_GM_LEAD"     => 100663296,
"FLAG_GM_PRODUCER" => 117440512,
"FLAG_BAZAAR"      => 2147483648
);

$charId = array();
$charName = array();
$charNation = array();
$charMainJob = array();
$charMainLevel = array();
$charSubJob = array();
$charSubLevel = array();
$charZoneName = array();
$charFlags = array();

// Data for Online Table
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
            s.nameflags
        FROM chars c
        LEFT JOIN zone_settings z ON z.zoneid = c.pos_zone
        INNER JOIN char_stats s ON s.charid = c.charid
        WHERE c.charid = ANY(SELECT charid FROM accounts_sessions);');
    $i = 0;
    while ($accountsSessionsRow = $getAccountsSessions->fetch())
    {
        $charId[$i] = $accountsSessionsRow['charid'];
        $charName[$i] = $accountsSessionsRow['charname'];
        $charNation[$i] = $accountsSessionsRow['nation'];
        $charMainJob[$i] = $accountsSessionsRow['mjob'];
        $charMainLevel[$i] = $accountsSessionsRow['mlvl'];
        $charSubJob[$i] = $accountsSessionsRow['sjob'];
        $charSubLevel[$i] = $accountsSessionsRow['slvl'];
        $charZoneName[$i] = $accountsSessionsRow['zonename'];
        $charFlags[$i] = $accountsSessionsRow['nameflags'];
        $i = $i + 1;
    }
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shows information of players currently online">
    <title>Canaria - Players Online</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<?php
echo "<h3>Characters Online:</h3>";
echo "<table class='charactersonline'><tr><th>Character Name</th><th>Zone</th><th>Main Job</th><th>Sub Job</th></tr>";
for ($x = 0; $x < $i ; $x+=1)
{
    $mainJob = $jobID[$charMainJob[$x]];
    $subJob = $jobID[$charSubJob[$x]];
    if ( !($charFlags[$x] & $flagID["FLAG_ANON"]))
    {
        if ($charSubLevel[$x] != 0)
        {
            echo "<tr><td>$charName[$x]</td><td>$charZoneName[$x]</td><td>$charMainLevel[$x] $mainJob</td><td>$charSubLevel[$x] $subJob</td></tr>";
        } else {
            echo "<tr><td>$charName[$x]</td><td>$charZoneName[$x]</td><td>$charMainLevel[$x] $mainJob</td><td></td></tr>";
        }
    } else {
        echo "<tr><td>$charName[$x]</td><td>*****</td><td>*****</td><td>*****</tr>";
    }
}
echo "</table></br></br>";
echo "<p>Server was last restarted $uptime ago</p>";
?>
