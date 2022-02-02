<?php
require 'functions/create_weather_table.php';
require'functions/create_menu_bar.php';
header("Refresh: 142"); // One vanadiel hour(ish)
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="If you guys don't get your act together, I'm ganna kick you into next watersday!">
    <title>Canaria - Weather Moogle Kupo!</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	<?php create_menu_bar();?>
	<?php create_weather_table();?>
</body>