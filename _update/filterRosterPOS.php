<?php

$pos = $_POST['pos'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');

if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

if ($pos === 'ALL') {
    $UpdatePoolFilter = mysql_query("UPDATE `roster_controls` set Value='' WHERE Control='PosFilter'", $con);
} else {
    $UpdatePoolFilter = mysql_query("UPDATE `roster_controls` set Value='{$pos}' WHERE Control='PosFilter'", $con);
}



header('Location: ' . $_SERVER['HTTP_REFERER']);

