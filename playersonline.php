<!DOCTYPE html>
<html lang="en">
<?php
require'functions/create_players_online_table.php';
require'functions/create_menu_bar.php';
$uptime = shell_exec("uptime -p | cut -c4-");
header("Refresh: 120");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shows information of players currently online">
    <title>Canaria - Players Online</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	<?php create_menu_bar();?>
	<h3>Characters Online:</h3>
	<?php create_players_online_table();?>
	<p>Server was last restarted <?php echo $uptime; ?> ago</p>
</body>