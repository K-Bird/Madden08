<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

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

$GetNameResult = db_query("SELECT * FROM `franchise_year_roster` where Row_ID='{$playerRow}'");
$GetName = $GetNameResult->fetch_assoc();
$playerName = addslashes($GetName['Name']);
$historicalID = $GetName['Historical_ID'];

$addPassStat = db_query("Insert into `franchise_year_indv_st` (Name, Category, FGA, FGM, FG_Percent, Longest_Play, Punt_AVG, I20, Ret_AVG, Ret_TDs, Historical_ID, Year, Team) Values ('{$playerName}','{$STtype}','{$addFGA}','{$addFGM}','{$addFGPercent}','{$addLong}','{$addPAVG}', '{$addI20}', '{$addRetAVG}','{$addRetTDs}', {$historicalID},'{$franYear}', '{$franchise}')");

header('Location: ' . $_SERVER['HTTP_REFERER']);