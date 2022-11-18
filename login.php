<?php

require "config/database.conf";

$username = $_POST['username'];
$password = $_POST['password'];


# Password only reads 16 characters in server
if (strlen($password) > 16) {
   $password = substr($password, 0, 16);
}

$account = array();

try {
    $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
    // set the PDO error mode to exception+
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $conn->prepare('
    SELECT
        a.login,
        a.password,
        c.charname
    FROM accounts a
    INNER JOIN
        chars c ON a.id = c.accid
    WHERE (a.login = :username AND a.password = PASSWORD(:password))');
    $sth->bindParam(':username', $username, PDO::PARAM_STR);
    $sth->bindParam(':password', $password, PDO::PARAM_STR);

    $sth->execute();
    $i = 0;
    while ($result = $sth->fetch()){
        $account[$i] = array(
            "charname" => $result['charname']
        );
        $i += 1;
    }
    if ($account[0]) {
        session_start();
        $_SESSION['username'] = $username;
        echo "<h1>" . $_SESSION['username'] . "</h1>";
        echo "<br>";
        foreach ($account as $char) {
            echo "<p>Well-met " . $char['charname'] . "</p>";
        }
        echo "<br>";
        echo "<p>This is still under construction, but it worked!</p>";
    } else {
        echo "Something went wrong";
    }
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>
