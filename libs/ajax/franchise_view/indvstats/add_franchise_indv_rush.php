<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$playerRow = $_POST['rusher'];
$addYards = $_POST['rushYards'];
$addTDs = $_POST['rushTDs'];
$addYPC = $_POST['rushYPC'];
$addFumble = $_POST['rushFumbles'];
$addBroken = $_POST['rushBroken'];
$addLongRun = $_POST['rushLong'];
$franchise = $_POST['franchise'];
$franYear = $_POST['franYear'];

$GetNameResult = db_query("SELECT * FROM `franchise_year_roster` where Row_ID='{$playerRow}'");
$GetName = $GetNameResult->fetch_assoc();
$playerName = addslashes($GetName['Name']);
$historicalID = $GetName['Historical_ID'];

$addRushStat = db_query("Insert into `franchise_year_indv_rushing` (Name, Yards, TDs, YPC, Fumble, Broken, LongRun, Historical_ID, Year, Team) Values ('{$playerName}','{$addYards}','{$addTDs}','{$addYPC}','{$addFumble}','{$addBroken}','{$addLongRun}', {$historicalID},'{$franYear}', '{$franchise}')");

header('Location: ' . $_SERVER['HTTP_REFERER']);