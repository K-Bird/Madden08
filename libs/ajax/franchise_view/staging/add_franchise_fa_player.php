<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$faRow = $_POST['AddFA'];
$faPOS = $_POST['AddFApos'];
$fran = $_POST['franchise'];
$year = $_POST['franYear'];

$getFAPlayerInfo = db_query("SELECT * FROM `franchise_staging_freeagency` WHERE Row_ID='{$faRow}'");
$FAPlayerRow = $getFAPlayerInfo->fetch_assoc();

$AddFAPlayerToRoster = db_query("INSERT INTO `franchise_year_roster` (Name, Position, Overall, Age, Weapon, Acquired, Rookie, OSU, Historical_ID, Team, Year) VALUES ('{$FAPlayerRow['Name']}','{$faPOS}','{$FAPlayerRow['Overall']}','{$FAPlayerRow['Age']}','None','Free Agent','','','', '{$fran}','{$year}')");

$getRowMax = db_query("SELECT MAX(`Row_ID`) as MaxRow FROM `franchise_year_roster`");
$Max = $getRowMax->fetch_object()->MaxRow;

$updateHistoricalID = db_query("Update `franchise_year_roster` set `Historical_ID` = `Row_ID` where `Row_ID`='{$Max}'");

//If linked to a master roster import by row id, import the base attributes for the imported player
if (empty($FAPlayerRow['Master_Row_ID'])) {
    
} else {
    $getMasterRosterInfo = db_query("SELECT * FROM `master_rosters` WHERE Row_ID='{$FAPlayerRow['Master_Row_ID']}'");
    $fetchMasterRosterInfo = $getMasterRosterInfo->fetch_assoc();

    $importSPD = $fetchMasterRosterInfo['spd'];
    $importSTR = $fetchMasterRosterInfo['str'];
    $importAWR = $fetchMasterRosterInfo['awr'];
    $importAGI = $fetchMasterRosterInfo['agi'];
    $importACC = $fetchMasterRosterInfo['acc'];
    $importCAT = $fetchMasterRosterInfo['cat'];
    $importCAR = $fetchMasterRosterInfo['car'];
    $importJMP = $fetchMasterRosterInfo['jmp'];
    $importBTK = $fetchMasterRosterInfo['btk'];
    $importTKL = $fetchMasterRosterInfo['tkl'];
    $importTHP = $fetchMasterRosterInfo['thp'];
    $importTHA = $fetchMasterRosterInfo['tha'];
    $importBP = $fetchMasterRosterInfo['bp'];
    $importRB = $fetchMasterRosterInfo['rb'];
    $importKP = $fetchMasterRosterInfo['kp'];
    $importKA = $fetchMasterRosterInfo['ka'];
    $importKR = $fetchMasterRosterInfo['kr'];
    $importSTA = $fetchMasterRosterInfo['sta'];
    $importINJ = $fetchMasterRosterInfo['inj'];
    $importMasterRow = $fetchMasterRosterInfo['Row_ID'];

    $importAttributes = db_query("UPDATE `franchise_year_roster` SET
    SPD = '{$importSPD}',
    STR = '{$importSTR}',
    AWR = '{$importAWR}',
    AGI = '{$importAGI}',
    ACC = '{$importACC}',
    CTH = '{$importCAT}',
    CAR = '{$importCAR}',
    JMP = '{$importJMP}',
    BTK = '{$importBTK}',
    TAK = '{$importTKL}',
    THP = '{$importTHP}',
    THA = '{$importTHA}',
    PBK = '{$importBP}',
    RBK = '{$importRB}',
    KPW = '{$importKP}',
    KAC = '{$importKA}',
    KR = '{$importKR}',
    STA = '{$importSTA}',
    INJ = '{$importINJ}',
    Master_Roster_ID = '{$importMasterRow}'

    WHERE Row_ID='{$Max}'");
}

$removeFromStaging = db_query("DELETE FROM `franchise_staging_freeagency` WHERE Row_ID='{$faRow}'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
