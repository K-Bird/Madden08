<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$playerRow = $_POST['receiver'];
$addRec = $_POST['recRec'];
$addYards = $_POST['recYards'];
$addTDs = $_POST['recTDs'];
$addYPC = $_POST['recYPC'];
$addLongRec = $_POST['recLong'];
$addDrop = $_POST['recDrop'];
$franchise = $_POST['franchise'];
$franYear = $_POST['franYear'];

$GetNameResult = db_query("SELECT * FROM `franchise_year_roster` where Row_ID='{$playerRow}'");
$GetName = $GetNameResult->fetch_assoc();
$playerName = addslashes($GetName['Name']);
$historicalID = $GetName['Historical_ID'];

$addPassStat = db_query("Insert into `franchise_year_indv_rec` (Name, Rec, Yards, TDs, YPC, LongCatch, Drops, Historical_ID, Year, Team) Values ('{$playerName}','{$addRec}','{$addYards}','{$addTDs}','{$addYPC}','{$addLongRec}','{$addDrop}', {$historicalID},'{$franYear}', '{$franchise}')");

header('Location: ' . $_SERVER['HTTP_REFERER']);