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
        c.charid,
        c.charname,
        cv.value AS has_echad
    FROM accounts a
    INNER JOIN
        chars c ON a.id = c.accid
    LEFT JOIN char_vars cv ON (cv.charid = c.charid AND cv.varname = \'xiweb_echad\')
    WHERE (a.login = :username AND a.password = PASSWORD(:password))');
    $sth->bindParam(':username', $username, PDO::PARAM_STR);
    $sth->bindParam(':password', $password, PDO::PARAM_STR);

    $sth->execute();
    $i = 0;
    while ($result = $sth->fetch()) {
        $account[$i] = array(
            "charid" => $result['charid'],
            "charname" => $result['charname'],
            "has_echad" => $result['has_echad'],
        );
        $i += 1;
    }
    if ($account[0]) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['chars_info'] = json_encode($account);
        echo "<h1>" . $_SESSION['username'] . "</h1>";
        echo "<br>";
        foreach ($account as $char) {

            if ($char['has_echad']) {
                echo "<p>Well-met " . $char['charname'] . ", You already have an Echad Ring.</p>";
                continue;
            }

            // Give Echad Ring
            $sth = $conn->prepare('
            INSERT INTO xidb.delivery_box (
                charid,
                charname,
                box,
                slot,
                itemid,
                itemsubid,
                quantity,
                extra,
                senderid,
                sender,
                received,
                sent
            )
            VALUES (
                :charid,
                :charname,
                1,
                (SELECT MAX(slot)+1 WHERE charid=:charid AND box=1),
                27556,
                0,
                1,
                NULL,
                0,
                \'AH-xiweb\',
                0,
                0
            );');
            $sth->bindParam(':charname', $char['charname'], PDO::PARAM_STR);
            $sth->bindParam(':charid', $char['charid'], PDO::PARAM_STR);
            $sth->execute();

            // Set charvar for item given
            $sth = $conn->prepare('
            INSERT INTO xidb.char_vars (
                charid,
                varname,
                value
            )
            VALUES (
                :charid,
                \'xiweb_echad\',
                1
            );');
            $sth->bindParam(':charid', $char['charid'], PDO::PARAM_STR);
            $sth->execute();

            echo "<p>Well-met " . $char['charname'] . ", an Echad Ring has been sent to your delivery box.</p>";
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
