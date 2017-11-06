<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$playerRow = $_POST['defense'];
$addPos = $_POST['defPosition'];
$addTackles = $_POST['defTackles'];
$addForLoss = $_POST['defForLoss'];
$addSacks = $_POST['defSacks'];
$addINTs = $_POST['defINTs'];
$addTDs = $_POST['defTDs'];
$addSaftey = $_POST['defSafety'];
$franchise = $_POST['franchise'];
$franYear = $_POST['franYear'];

$GetNameResult = db_query("SELECT * FROM `franchise_year_roster` where Row_ID='{$playerRow}'");
$GetName = $GetNameResult->fetch_assoc();
$playerName = addslashes($GetName['Name']);
$historicalID = $GetName['Historical_ID'];

$addPassStat = db_query("Insert into `franchise_year_indv_def` (Name, Position, Tackles, ForLoss, Sacks, INTs, TDs, Safety, Historical_ID, Year, Team) Values ('{$playerName}','{$addPos}','{$addTackles}','{$addForLoss}','{$addSacks}','{$addINTs}','{$addTDs}','{$addSaftey}','{$historicalID}','{$franYear}', '{$franchise}')");

header('Location: ' . $_SERVER['HTTP_REFERER']);