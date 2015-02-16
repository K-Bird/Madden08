<?php

$playerRow = $_POST['passer'];
$addRating = $_POST['passRating'];
$addYards = $_POST['passYards'];
$addTDs = $_POST['passTDs'];
$addINTs = $_POST['passINTs'];
$addComp = $_POST['passComp'];
$addSacked = $_POST['passSacked'];
$franchise = $_POST['franchise'];
$franYear = $_POST['franYear'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$GetNameResult = mysql_query("SELECT * FROM `{$franchise}_players` where Row_ID={$playerRow}");
$GetName = mysql_fetch_array($GetNameResult);
$playerName = $GetName['Name'];
$historicalID = $GetName['Historical_ID'];


$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$addNewPlayer = mysql_query("Insert into `{$franchise}_stats_passing` (Player, Rating, Yards, TDs, INTs, Comp, Sacked, Historical_ID, Year) Values ('{$playerName}','{$addRating}','{$addYards}','{$addTDs}','{$addINTs}','{$addComp}','{$addSacked}', {$historicalID},'{$franYear}')", $con) or die(mysql_error());

