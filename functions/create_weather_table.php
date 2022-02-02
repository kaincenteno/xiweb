<?php 
function VanadielClock(){
    $VANA_EPOCH     = 1009810800;
    $VANA_YEAR      = 518400;
    $VANA_MONTH     = 43200;
    $VANA_DAY       = 1440;
    $VANA_HOUR      = 60;
    
    $vanadielNow = time() - $VANA_EPOCH;
    // Total elapsed vanadiel minutes ever
    $vanaTimestamp = ($vanadielNow / 60.0 * 25) + 886 * $VANA_YEAR;
                
    return array(
        'year'            => floor(($vanaTimestamp / $VANA_YEAR)),
        'month'           => floor((($vanaTimestamp / $VANA_MONTH) % 12) + 1),
        'day'             => floor((($vanaTimestamp / $VANA_DAY) % 30) + 1),
        'hour'            => floor((($vanaTimestamp % $VANA_DAY) / $VANA_HOUR)),
        'minute'          => floor(($vanaTimestamp % $VANA_HOUR)),
        'vana_now'        => $vanadielNow,
        'vana_timestamp'  => $vanaTimestamp,
    );
}

// The count on the 2160 day cycle
function WeatherCycleDay($vanatime)
{
    return floor($vanatime['vana_now'] / 3456) % 2160;
}

function GetWeatherForDay($blob, $day)
{
    // (PHP unpacked indexes start at 1... so day 0 = index 1.)
    $day += 1;
    $blob = unpack("v*", $blob);
    if($blob[$day] >> 15){
        echo "Encountered non-zero padding bit. Possible encoding or DB error.";
    }
    // Decode weather blob
    return array(
        "rare"   => $blob[$day] & 31,
        "common" => ($blob[$day] >> 5)  & 31,
        "normal" => ($blob[$day] >> 10) & 31
    );
}

function create_weather_table() 
{
    require 'config/database.conf';
    require 'globals/weatherID.php';
    
    $zones = array();
    
    try {
        $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $queryWeather  = $conn->query('
        SELECT
            w.zone,
            w.weather,
            REPLACE(z.name,"_"," ") name
        FROM zone_weather w
        LEFT JOIN zone_settings z ON z.zoneid = w.zone
        WHERE CAST(w.zone AS char) <> z.name
            AND z.name NOT LIKE "Abyssea%"
            AND z.name NOT LIKE "unknown"
        ORDER BY z.name;');
        $z = 0;
        while ($row = $queryWeather->fetch()){
            // Add entry for this zone
            $zones[$z] = array(
                "name" => $row["name"],
                "id" => $row["zone"],
                "weather" => $row['weather']
            );
            $z += 1;
        }
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
    $vanatime = VanadielClock();
    $today = WeatherCycleDay($vanatime);
    $tomorrow   = ($today + 1) % 2160;
    
    echo "<h3>Vana'diel time is now: " . sprintf("%04d/%02d/%02d - %02d:%02d", $vanatime['year'], $vanatime['month'], $vanatime['day'], $vanatime['hour'],$vanatime['minute']) . "</h3>";
    echo "<h4>The weather forecast for tomorrow is as follows.</h4>";
    echo "<table class='plaintable'><tr><th>Zone Name</th><th>Likely 50%</th><th>Chance 35%</th><th>Rarely 15%</th></tr>";
    
    for ($i = 0; $i < count($zones) ; $i++){
        $zone = $zones[$i];
        $forecast = GetWeatherForDay($zone["weather"], $tomorrow);
        echo "<tr><td>"
            . $zone["name"] . "</td><td>"
                . $weatherID[$forecast["normal"]] . "</td><td>"
                    . $weatherID[$forecast["common"]] . "</td><td>"
                        . $weatherID[$forecast["rare"]] . "</td></tr>";
    }
    echo "</table>";
}
?>