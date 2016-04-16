<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$draftedRow = $_POST['AddDrafted'];
$draftedPOS = $_POST['AddDraftedPOS'];
$fran = $_POST['franchise'];
$year = $_POST['franYear'];

$getDraftPlayerInfo = db_query("SELECT * FROM `franchise_staging_drafted` WHERE Row_ID='{$draftedRow}'");
$DraftedPlayerRow = $getDraftPlayerInfo->fetch_assoc();

$AddDraftedPlayerToRoster = db_query("INSERT INTO `franchise_year_roster` (Name, Position, Overall, Age, Weapon, Acquired, Rookie, OSU, Historical_ID, Team, Year) VALUES ('{$DraftedPlayerRow['Name']}','{$draftedPOS}','{$DraftedPlayerRow['Overall']}','{$DraftedPlayerRow['Age']}','','Drafted','R','','', '{$fran}','{$year}')");

$getRowMax = db_query("SELECT MAX(`Row_ID`) as MaxRow FROM `franchise_year_roster`");
$Max = $getRowMax->fetch_object()->MaxRow;

$updateHistoricalID = db_query("Update `franchise_year_roster` set `Historical_ID` = `Row_ID` where `Row_ID`={$Max}");

$removeFromStaging = db_query("DELETE FROM `franchise_staging_drafted` WHERE Row_ID='{$draftedRow}'");

header('Location: ' . $_SERVER['HTTP_REFERER']);