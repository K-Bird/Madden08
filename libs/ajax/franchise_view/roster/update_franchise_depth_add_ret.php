<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$existingRow = $_POST['existingReturn'];
$addOverall = $_POST['addOverall'];
$addKR = $_POST['addKR'];
$ret_pos= $_POST['pos'];
$franchise = $_POST['fran'];
$franchiseYear = $_POST['franYear'];

$selectExisting = db_query("SELECT * From `franchise_year_roster` WHERE Row_ID={$existingRow}");
$existing_Row = $selectExisting->fetch_assoc();
$existing_Row_Name = addslashes($existing_Row['Name']);

$addNewPlayer = db_query("Insert into `franchise_year_roster` ("
        . "Name, "
        . "Position, "
        . "Overall, "
        . "Age, "
        . "SPD, "
        . "AGI, "
        . "ACC, "
        . "CAR, "
        . "BTK, "
        . "STA, "
        . "INJ, "
        . "TGH, "
        . "IMP, "
        . "KR, "
        . "Team, "
        . "Year"
        . ") Values ("
        . "'{$existing_Row_Name}',"
        . "'{$ret_pos}',"
        . "'{$addOverall}',"
        . "'{$existing_Row['Age']}',"
        . "'{$existing_Row['SPD']}',"
        . "'{$existing_Row['AGI']}',"
        . "'{$existing_Row['ACC']}',"
        . "'{$existing_Row['CAR']}',"
        . "'{$existing_Row['BTK']}',"
        . "'{$existing_Row['STA']}',"
        . "'{$existing_Row['INJ']}',"
        . "'{$existing_Row['TGH']}',"
        . "'{$existing_Row['IMP']}',"
        . "'{$addKR}',"
        . "'{$franchise}',"
        . "'{$franchiseYear}')");
        
$createHistoricalID = db_query("Update `franchise_year_roster` set Historical_ID = Row_ID where Year='{$franchiseYear}' and Position='{$ret_pos}' and Team='{$franchise}'");
