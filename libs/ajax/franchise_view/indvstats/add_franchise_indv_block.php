<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$playerRow = $_POST['blocker'];
$addPancakes = $_POST['blockPancakes'];
$addSacks = $_POST['blockSacks'];
$addPosition = $_POST['blockPosition'];
$franchise = $_POST['franchise'];
$franYear = $_POST['franYear'];

$GetNameResult = db_query("SELECT * FROM `franchise_year_roster` where Row_ID='{$playerRow}'");
$GetName = $GetNameResult->fetch_assoc();
$playerName = addslashes($GetName['Name']);
$historicalID = $GetName['Historical_ID'];

$addBlockStat = db_query("Insert into `franchise_year_indv_block` (Name, Position, Pancakes, Sacks, Historical_ID, Year, Team) Values ('{$playerName}','{$addPosition}','{$addPancakes}','{$addSacks}',{$historicalID},'{$franYear}', '{$franchise}')");

header('Location: ' . $_SERVER['HTTP_REFERER']);