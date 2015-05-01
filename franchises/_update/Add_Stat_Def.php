<?php

$playerRow = $_POST['defense'];
$addPos = $_POST['defPosition'];
$addTackles = $_POST['defTackles'];
$addForLoss = $_POST['defForLoss'];
$addSacks = $_POST['defSacks'];
$addINTs = $_POST['defINTs'];
$addTDs = $_POST['defTDs'];
$addSaftey = $_POST['defSafety'];
$franchise = $_POST['franchise'];
$franYear = $_POST['franYear'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');

if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$GetNameResult = mysql_query("SELECT * FROM `{$franchise}_players` where Row_ID={$playerRow}", $con);
$GetName = mysql_fetch_array($GetNameResult);
$playerName = mysql_real_escape_string($GetName['Name']);
$historicalID = $GetName['Historical_ID'];

$addNewPlayer = mysql_query("Insert into `{$franchise}_stats_def` (Player, Position, Tackles, ForLoss, Sacks, INTs, TDs, Saftey, Historical_ID, Year) Values ('{$playerName}','{$addPos}','{$addTackles}','{$addForLoss}','{$addSacks}','{$addINTs}','{$addTDs}','{$addSaftey}',{$historicalID},'{$franYear}')", $con) or die(mysql_error());

