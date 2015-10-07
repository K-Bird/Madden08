<?php

$team = $_POST['team'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');

if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

if ($team === 'ALL') {
    $UpdatePoolFilter = mysql_query("UPDATE `roster_controls` set Value='' WHERE Control='TeamFilter'", $con);
} else {
    $UpdatePoolFilter = mysql_query("UPDATE `roster_controls` set Value='{$team}' WHERE Control='TeamFilter'", $con);
}


header('Location: ' . $_SERVER['HTTP_REFERER']);

