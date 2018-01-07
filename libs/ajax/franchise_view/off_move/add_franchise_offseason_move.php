<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$moveType = $_POST['moveType'];
$position = $_POST['pos'];
$playerName = addslashes($_POST['freePlayer']);
$retiredPlayerID = $_POST['selectedPlayer'];
$ovr = $_POST['Ovr'];
$age = $_POST['Age'];
$draft = $_POST['Draft'];  
$franchise = $_POST['fran'];
$franYear = $_POST['franYear'];

if ($moveType === 'retired') {
    $pullRetiredPlayerInfo = db_query("SELECT * FROM `franchise_year_roster` WHERE Row_ID={$retiredPlayerID}");
    $retiredPlayerRow = $pullRetiredPlayerInfo->fetch_assoc();

    $addRetiredPlayerInfo = db_query("INSERT INTO `franchise_year_off_moves` (Player, Position, Overall, Age, Draft, Year, Type, Team) Values ('{$retiredPlayerRow['Name']}','{$retiredPlayerRow['Position']}','{$ovr}','{$age}','{$draft}','{$franYear}','{$moveType}', '{$franchise}')");
    $getMovesMax = db_query("SELECT MAX(`Row`) as MaxMove FROM `franchise_year_off_moves`");
    $getMoveRow = $getMovesMax->fetch_assoc();
    $MoveMax = $getMoveRow['MaxMove'];
    $addRetiredToStaging = db_query("INSERT INTO `franchise_staging_retired` (PlayerRow, Franchise, Year, MoveRow) Values ('{$retiredPlayerID}','{$franchise}','{$franYear}','{$MoveMax}')");
} else if ($moveType === 'draft') {
    $addNewMove = db_query("Insert into `franchise_year_off_moves` (Player, Position, Overall, Age, Draft, Year, Type, Team) Values ('{$playerName}','{$position}','{$ovr}','{$age}','{$draft}','{$franYear}','{$moveType}', '{$franchise}')");
    $getMovesMax = db_query("SELECT MAX(`Row`) as MaxMove FROM `franchise_year_off_moves`");
    $getMoveRow = $getMovesMax->fetch_assoc();
    $MoveMax = $getMoveRow['MaxMove'];
    $addDraftedToStaging = db_query("INSERT INTO `franchise_staging_drafted` (Name, Position, Overall, Age, Rookie, Franchise, Year, MoveRow) Values ('{$playerName}','{$position}','{$ovr}','{$age}','R','{$franchise}','{$franYear}','{$MoveMax}')");
} else if ($moveType === 'prefa' or $moveType === 'postfa') {
    $addNewMove = db_query("Insert into `franchise_year_off_moves` (Player, Position, Overall, Age, Draft, Year, Type, Team) Values ('{$playerName}','{$position}','{$ovr}','{$age}','{$draft}','{$franYear}','{$moveType}', '{$franchise}')");
    $getMovesMax = db_query("SELECT MAX(`Row`) as MaxMove FROM `franchise_year_off_moves`");
    $getMoveRow = $getMovesMax->fetch_assoc();
    $MoveMax = $getMoveRow['MaxMove'];
    $addFAToStaging = db_query("INSERT INTO `franchise_staging_freeagency` (Name, Position, Overall, Age, Rookie, Franchise, Year, MoveRow) Values ('{$playerName}','{$position}','{$ovr}','{$age}','','{$franchise}','{$franYear}','{$MoveMax}')");
} else {
    $addNewMove = db_query("Insert into `franchise_year_off_moves` (Player, Position, Overall, Age, Draft, Year, Type, Team) Values ('{$playerName}','{$position}','{$ovr}','{$age}','{$draft}','{$franYear}','{$moveType}', '{$franchise}')");
}

header('Location: ' . $_SERVER['HTTP_REFERER']);