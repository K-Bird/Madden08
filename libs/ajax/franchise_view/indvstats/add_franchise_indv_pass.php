<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$playerRow = $_POST['passer'];
$addRating = $_POST['passRating'];
$addYards = $_POST['passYards'];
$addTDs = $_POST['passTDs'];
$addINTs = $_POST['passINTs'];
$addComp = $_POST['passComp'];
$addSacked = $_POST['passSacked'];
$franchise = $_POST['franchise'];
$franYear = $_POST['franYear'];

$GetNameResult = db_query("SELECT * FROM `franchise_year_roster` where Row_ID='{$playerRow}'");
$GetName = $GetNameResult->fetch_assoc();
$playerName = mysql_real_escape_string($GetName['Name']);
$historicalID = $GetName['Historical_ID'];

$addPassStat = db_query("Insert into `franchise_year_indv_passing` (Name, Rating, Yards, TDs, INTs, Comp, Sacked, Historical_ID, Year, Team) Values ('{$playerName}','{$addRating}','{$addYards}','{$addTDs}','{$addINTs}','{$addComp}','{$addSacked}', {$historicalID},'{$franYear}', '{$franchise}')");

header('Location: ' . $_SERVER['HTTP_REFERER']);