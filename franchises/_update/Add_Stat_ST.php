<?php

$playerRow = $_POST['specialTeams'];
$STtype = $_POST['STType'];
$addFGA = $_POST['stFGA'];
$addFGM = $_POST['stFGM'];
$addFGPercent = $_POST['stFGPercent'];
$addLong = $_POST['stLong'];
$addPAVG = $_POST['stPAVG'];
$addI20 = $_POST['stI20'];
$addRetAVG = $_POST['stRetAVG'];
$addRetTDs = $_POST['stRetTDs'];
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

$addNewPlayer = mysql_query("Insert into `{$franchise}_stats_special` (Player, Category, FGA, FGM, FG_Percent, Longest_Play, Punt_AVG, I20, Ret_AVG, Ret_TDs, Historical_ID, Year) Values ('{$playerName}','{$STtype}','{$addFGA}','{$addFGM}','{$addFGPercent}','{$addLong}','{$addPAVG}', '{$addI20}', '{$addRetAVG}','{$addRetTDs}','{$historicalID}','{$franYear}')", $con) or die(mysql_error());

