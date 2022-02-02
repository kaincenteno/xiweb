<?php
require'functions/create_unsold_items_table.php';
require'functions/create_menu_bar.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="xiweb Auction House">
    <title>xiweb - Auction House</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	<?php create_menu_bar();?>
    <h1> Items in Auction House</h1>
    <?php create_unsold_items_table();?>
</body>