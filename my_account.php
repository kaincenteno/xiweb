<?php
require'functions/create_menu_bar.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="xiweb My Account">
    <title>xiweb - My Account</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	<?php create_menu_bar();?>

    <h1>My Account</h1>
    <p>Enter your credentials to log in</p>

    <form action="login.php" method="post">
        <label for='username'>Username:</label>
        <input type='text' name='username' value=''>
        <label for='password'>Password:</label>
        <input type='password' name='password' value=''>
        <button type='submit'>Login</button>
    </form>
</body>
