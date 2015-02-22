<?php

$playerRow = $_POST['rusher'];
$addYards = $_POST['rushYards'];
$addTDs = $_POST['rushTDs'];
$addYPC = $_POST['rushYPC'];
$addFumble = $_POST['rushFumbles'];
$addBroken = $_POST['rushBroken'];
$addLongRun = $_POST['rushLong'];
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

$addNewPlayer = mysql_query("Insert into `{$franchise}_stats_rushing` (Player, Yards, TDs, YPC, Fumble, Broken, LongRun, Historical_ID, Year) Values ('{$playerName}','{$addYards}','{$addTDs}','{$addYPC}','{$addFumble}','{$addBroken}','{$addLongRun}', {$historicalID},'{$franYear}')", $con) or die(mysql_error());

