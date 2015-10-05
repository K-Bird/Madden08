<?php

$draftedRow = $_POST['AddFA'];
$draftedPOS = $_POST['AddFApos'];
$fran = $_POST['franchise'];
$year = $_POST['franYear'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');

if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$getDraftPlayerInfo = mysql_query("SELECT * FROM `franchise_staging_freeagency` WHERE Row_ID='{$draftedRow}'", $con) or die(mysql_error());
$DraftedPlayerRow = mysql_fetch_array($getDraftPlayerInfo);

$AddDraftedPlayerToRoster = mysql_query("INSERT INTO `{$fran}_players` (Name, Position, Overall, Age, Weapon, OnTeam, Rookie, OSU, Historical_ID, Year) VALUES ('{$DraftedPlayerRow['Name']}','{$draftedPOS}','{$DraftedPlayerRow['Overall']}','{$DraftedPlayerRow['Age']}','','Drafted','R','','','{$year}')", $con) or die(mysql_error());

$getRowMax = mysql_query("SELECT MAX(`Row_ID`) as MaxRow FROM `{$fran}_players`", $con) or die(mysql_error());
$getRowRow = mysql_fetch_array($getRowMax);
$RowMax = $getRowRow['MaxRow'];
$updateHistoricalID = mysql_query("Update `{$fran}_players` set `Historical_ID` = `Row_ID` where `Row_ID`={$RowMax}", $con);

$removeFromStaging = mysql_query("DELETE FROM `franchise_staging_freeagency` WHERE Row_ID='{$draftedRow}'", $con) or die(mysql_error());

header('Location: ' . $_SERVER['HTTP_REFERER']);
