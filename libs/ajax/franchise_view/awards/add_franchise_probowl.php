<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$playerRow = $_POST['player'];
$position = $_POST['pos'];
$franchise = $_POST['fran'];
$franYear = $_POST['franYear'];

$GetNameResult = db_query("SELECT * FROM `franchise_year_roster` where Row_ID='{$playerRow}'");
$GetName = $GetNameResult->fetch_assoc();
$playerName = addslashes($GetName['Name']);
$historicalID = $GetName['Historical_ID'];

$addNewPlayer = db_query("Insert into `franchise_year_probowl` (Player, Position, Historical_ID, Year, Team) Values ('{$playerName}','{$position}','{$historicalID}','{$franYear}', '{$franchise}')");

header('Location: ' . $_SERVER['HTTP_REFERER']);
