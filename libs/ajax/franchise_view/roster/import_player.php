<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$playerRow = $_POST['playerRow'];
$pos = $_POST['pos'];
$team = $_POST['team'];
$year = $_POST['year'];

$getImportPlayer = db_query("SELECT * FROM `master_rosters` WHERE Row_ID={$playerRow}");
$fetchImportPlayer = $getImportPlayer->fetch_assoc();




$importName = addslashes($fetchImportPlayer['firstname'] . " " . $fetchImportPlayer['lastname']);
$importOverall = $fetchImportPlayer['ovr'];
$importAge = $fetchImportPlayer['age'];
$importSPD = $fetchImportPlayer['spd'];
$importSTR = $fetchImportPlayer['str'];
$importAWR = $fetchImportPlayer['awr'];
$importAGI = $fetchImportPlayer['agi'];
$importACC = $fetchImportPlayer['acc'];
$importCAT = $fetchImportPlayer['cat'];
$importCAR = $fetchImportPlayer['car'];
$importJMP = $fetchImportPlayer['jmp'];
$importBTK = $fetchImportPlayer['btk'];
$importTKL = $fetchImportPlayer['tkl'];
$importTHP = $fetchImportPlayer['thp'];
$importTHA = $fetchImportPlayer['tha'];
$importBP = $fetchImportPlayer['bp'];
$importRB = $fetchImportPlayer['rb'];
$importKP = $fetchImportPlayer['kp'];
$importKA = $fetchImportPlayer['ka'];
$importKR = $fetchImportPlayer['kr'];
$importSTA = $fetchImportPlayer['sta'];
$importINJ = $fetchImportPlayer['inj'];
$importMasterRow = $fetchImportPlayer['Row_ID'];

$importPlayer = db_query("Insert into `franchise_year_roster`
(Name, Position, Overall, Age, Weapon, Acquired, Rookie, OSU, SPD, STR, AWR, AGI, ACC, CTH, CAR, JMP, BTK, TAK, THP, THA, PBK, RBK, KPW, KAC, KR, IMP, STA, INJ, TGH, Master_Roster_ID, Team, Year) Values 

('{$importName}',
'{$pos}',
'{$importOverall}',
'{$importAge}', 
'None',
'',
'',
'',
'{$importSPD}',
'{$importSTR}',
'{$importAWR}',
'{$importAGI}',
'{$importACC}',
'{$importCAT}',
'{$importCAR}',
'{$importJMP}',
'{$importBTK}',
'{$importTKL}',
'{$importTHP}',
'{$importTHA}',
'{$importBP}',
'{$importRB}',
'{$importKP}',
'{$importKA}',
'{$importKR}',
'0',
'{$importSTA}',
'{$importINJ}',
'',    
'{$importMasterRow}',
'{$team}',
'{$year}')");

$updateHistoricalID = db_query("Update `franchise_year_roster` set Historical_ID = Row_ID where Year='{$year}' and Position='{$pos}' and Team='{$team}'");
