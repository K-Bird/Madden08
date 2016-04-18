<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$addName = mysql_real_escape_string($_POST['addName']);
$addOverall = $_POST['addOverall'];
$addAge = $_POST['addAge'];
$addOnTeam = $_POST['addOnTeam'];
$addVetRookie = $_POST['addVR'];
$addWeapon = $_POST['addWeapon'];
$addOSU = $_POST['addOSU'];
$franchise = $_POST['fran'];
$franchiseYear = $_POST['franYear'];
$position = $_POST['pos'];

$addNewPlayer = db_query("Insert into `franchise_year_roster` (Name, Position, Overall, Age, Weapon, Acquired, Rookie, OSU, Team, Year) Values ('{$addName}','{$position}','{$addOverall}','{$addAge}',  '{$addWeapon}', '{$addOnTeam}', '{$addVetRookie}', '{$addOSU}', '{$franchise}','{$franchiseYear}')");
$updateHistoricalID = db_query("Update `franchise_year_roster` set Historical_ID = Row_ID where Year='{$franchiseYear}' and Position='{$position}' and Team='{$franchise}'");
