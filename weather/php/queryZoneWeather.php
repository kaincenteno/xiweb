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
            'year'            => (int)($vanaTimestamp / $VANA_YEAR),
            'month'           => ((int)($vanaTimestamp / $VANA_MONTH) % 12) + 1,
            'day'             => ((int)($vanaTimestamp / $VANA_DAY) % 30) + 1,
            'hour'            => (int)(((int)$vanaTimestamp % $VANA_DAY) / $VANA_HOUR),
            'minute'          => (int)$vanaTimestamp % $VANA_HOUR,
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

    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.conf';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/globals/weatherID.php';
    
    $vanatime = VanadielClock();
    $today = WeatherCycleDay($vanatime);
    $tomorrow   = ($today + 1) % 2160;
    $zones = array();
    $output = array();

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
        while ($row = $queryWeather->fetch()) {
            // Add entry for this zone
            $zones[$z] = array(
                "name" => $row["name"],
                "id" => $row["zone"],
                "weather" => $row['weather']
            );
            $z += 1;
        }

        for ($i = 0; $i < count($zones) ; $i++){
            $zone = $zones[$i];
            $forecast = GetWeatherForDay($zone["weather"], $tomorrow);

            $zoneName = $zone["name"];
            $normalWeather = $weatherID[$forecast["normal"]];
            $commonWeather = $weatherID[$forecast["common"]];
            $rareWeather = $weatherID[$forecast["rare"]];

            $output[$i] = [$zoneName, $normalWeather, $commonWeather, $rareWeather];
        }

        echo json_encode($output);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
