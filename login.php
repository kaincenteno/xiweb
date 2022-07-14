<?php 

require "config/database.conf";

$username = $_POST['username'];
$password = $_POST['password'];


# Password only reads 16 characters in server
if (strlen($password) > 16) {
   $password = substr($password, 0, 16);
}

try {
    $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    // set the PDO error mode to exception+
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $conn->prepare('
    SELECT
        login,
        password
    FROM accounts
    WHERE (login = :username AND password = PASSWORD(:password))');
    $sth->bindParam(':username', $username, PDO::PARAM_STR);
    $sth->bindParam(':password', $password, PDO::PARAM_STR);

    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        session_start();
        $_SESSION['username'] = $username;
        echo "<p>Welcome, " . $_SESSION['username'] . "</p>";
        echo "<p>This is still under construction, but it worked!</p>";
    } else {
        echo "Something went wrong";
    }
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>
