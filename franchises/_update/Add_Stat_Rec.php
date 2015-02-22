<?php

$playerRow = $_POST['receiver'];
$addRec = $_POST['recRec'];
$addYards = $_POST['recYards'];
$addTDs = $_POST['recTDs'];
$addYPC = $_POST['recYPC'];
$addLongRec = $_POST['recLong'];
$addDrop = $_POST['recDrop'];
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

$addNewPlayer = mysql_query("Insert into `{$franchise}_stats_rec` (Player, Rec, Yards, TDs, YPC, LongCatch, Drops, Historical_ID, Year) Values ('{$playerName}','{$addRec}','{$addYards}','{$addTDs}','{$addYPC}','{$addLongRec}','{$addDrop}', {$historicalID},'{$franYear}')", $con) or die(mysql_error());

