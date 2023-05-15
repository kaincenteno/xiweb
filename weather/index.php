<!DOCTYPE html>
<html lang="en">
<?php
header("Refresh: 142"); // One vanadiel hour(ish)
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="If you guys don't get your act together, I'm ganna kick you into next watersday!">
  <title>xiweb - Weather Moogle Kupo!</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="icon" type="image/png" href="favicon-32.png" sizes="32x32">
</head>

<body>
  <div class="content">
    <div class='menu'></div>

    <div class="weather">
      <h3 class="vanadielTime"></h3>
      <h4>The weather forecast for tomorrow is as follows.</h4>
      <table class="plaintable">
        <thead>
          <tr><th>Zone Name</th><th>Likely 50%</th><th>Chance 35%</th><th>Rarely 15%</th></tr>
        </thead>
        <tbody class="weather_body">
        </tbody>
      </table>
    </div>

  </div>

  <script type="text/javascript" src="../script/menu.js"></script>
  <script type="text/javascript" src="/weather/script/vanadiel_time.js"></script>
  <script type="text/javascript" src="/weather/script/query_zone_weather.js"></script>
</body>
