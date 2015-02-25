<?php

$playerRow = $_POST['blocker'];
$addPancakes = $_POST['blockPancakes'];
$addSacks = $_POST['blockSacks'];
$addPosition = $_POST['blockPosition'];
$franchise = $_POST['franchise'];
$franYear = $_POST['franYear'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');

if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$GetNameResult = mysql_query("SELECT * FROM `{$franchise}_players` where Row_ID={$playerRow}", $con);
$GetName = mysql_fetch_array($GetNameResult);
$playerName = $GetName['Name'];
$historicalID = $GetName['Historical_ID'];

$addNewPlayer = mysql_query("Insert into `{$franchise}_stats_block` (Player, Position, Pancakes, Sacks, Historical_ID, Year) Values ('{$playerName}','{$addPosition}','{$addPancakes}','{$addSacks}',{$historicalID},'{$franYear}')", $con) or die(mysql_error());

