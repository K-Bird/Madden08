<?php

$playerRow = $_POST['player'];
$award = $_POST['award'];
$position = $_POST['pos'];
$franchise = $_POST['fran'];
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

$addNewPlayer = mysql_query("Insert into `{$franchise}_off_awards` (Player, Position, Award, Historical_ID, Year) Values ('{$playerName}','{$position}','{$award}','{$historicalID}','{$franYear}')", $con) or die(mysql_error());

header('Location: ' . $_SERVER['HTTP_REFERER']);