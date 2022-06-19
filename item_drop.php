<?php
require'functions/create_item_drop_table.php';
require'functions/create_menu_bar.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="xiweb Item Drop Info">
    <title>xiweb - Item Drop Info</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	<?php create_menu_bar();?>
    <h1> List of items dropped by mobs</h1>
    <?php create_item_drop_table();?>
</body>
