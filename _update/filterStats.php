<?php

$team = $_POST['team'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');

if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$UpdateTeamFilter = mysql_query("UPDATE `stat_controls` set Value='{$team}' WHERE Control='TeamStatsFilter'", $con);

header('Location: ' . $_SERVER['HTTP_REFERER']);

