<!DOCTYPE html>
<html lang="en">
<?php
require 'functions/create_weather_table.php';
header("Refresh: 142"); // One vanadiel hour(ish)
?>
<script async type="text/javascript" src="script/menu.js"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="If you guys don't get your act together, I'm ganna kick you into next watersday!">
    <title>Canaria - Weather Moogle Kupo!</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div class='menu'></div>
	<?php create_weather_table();?>
</body>