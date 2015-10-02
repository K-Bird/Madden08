<?php

$draftedRow = $_POST['AddDrafted'];
$draftedPOS = $_POST['AddDraftedPOS'];
$fran = $_POST['franchise'];
$year = $_POST['franYear'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');

if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$getDraftPlayerInfo = mysql_query("SELECT * FROM `franchise_staging_drafted` WHERE Row_ID='{$draftedRow}'", $con) or die(mysql_error());
$DraftedPlayerRow = mysql_fetch_array($getDraftPlayerInfo);

$AddDraftedPlayerToRoster = mysql_query("INSERT INTO `{$fran}_players` (Name, Position, Overall, Age, Weapon, OnTeam, Rookie, OSU, Historical_ID, Year) VALUES ('{$DraftedPlayerRow['Name']}','{$draftedPOS}','{$DraftedPlayerRow['Overall']}','{$DraftedPlayerRow['Age']}','','Drafted','R','','','{$year}')", $con) or die(mysql_error());

$removeFromStaging = mysql_query("DELETE FROM `franchise_staging_drafted` WHERE Row_ID='{$draftedRow}'", $con) or die(mysql_error());

header('Location: ' . $_SERVER['HTTP_REFERER']);