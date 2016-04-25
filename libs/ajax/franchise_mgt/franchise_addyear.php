<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$fran = $_POST['fran'];
$PrimaryColor;
$SecondaryColor;

$GetYears = db_query("Select * From `franchise_info` where `Franchise`='$fran'");
$YearRow = $GetYears->fetch_assoc();
$previousYear = $YearRow['CurrentYear'];
$nextYear = $previousYear + 1;

$SetYear = db_query("UPDATE `franchise_info` SET `CurrentYear` = '{$nextYear}' where `Franchise`='{$fran}'");
$GetColors = db_query("Select * From `franchise_info` where `Franchise`='{$fran}'");

$row = $GetColors->fetch_assoc();
$PrimaryColor = $row['PrimaryColor'];
$SecondaryColor = $row['SecondaryColor'];

/* | DATABASE TABLES CREATION | */

/* Grab previous year offseason coaches for insertion into next year's coaching staff */
$GetPreviousHC = db_query("SELECT * FROM `franchise_year_off_coach` WHERE Year={$previousYear} and Position='HC' and Team='{$fran}'");
$PreviousHCobj = $GetPreviousHC->fetch_assoc();
$PreviousHC = $PreviousHCobj['Name'];

$GetPreviousOC = db_query("SELECT * FROM `franchise_year_off_coach` WHERE Year={$previousYear} and Position='OC' and Team='{$fran}'");
$PreviousOCobj = $GetPreviousOC->fetch_assoc();
$PreviousOC = $PreviousOCobj['Name'];

$GetPreviousDC = db_query("SELECT * FROM `franchise_year_off_coach` WHERE Year={$previousYear} and Position='DC' and Team='{$fran}'");
$PreviousDCobj = $GetPreviousDC->fetch_assoc();
$PreviousDC = $PreviousDCobj['Name'];

$GetPreviousST = db_query("SELECT * FROM `franchise_year_off_coach` WHERE Year={$previousYear} and Position='ST' and Team='{$fran}'");
$PreviousSTobj = $GetPreviousST->fetch_assoc();
$PreviousST = $PreviousSTobj['Name'];

$PopulateCoachingStaffTable = "INSERT INTO `franchise_year_pre_coaches` (`Name`, `Position`, `Team`, `Year`) VALUES
('{$PreviousHC}','HC', '{$fran}', '{$nextYear}'),
('{$PreviousOC}','OC', '{$fran}', '{$nextYear}'),
('{$PreviousDC}','DC', '{$fran}', '{$nextYear}'),
('{$PreviousST}','ST', '{$fran}', '{$nextYear}');";
db_query($PopulateCoachingStaffTable);

$PopulateInfoTable = "INSERT INTO `franchise_year_info` (`Field_Display`, `Field_ID`, `Field_Value`, `Franchise`, `Year`, `Section`) VALUES
('Team Prestige', 'prestige', '', '{$fran}', '{$nextYear}', 'preseason'),
('Salary Cap', 'cap', '', '{$fran}', '{$nextYear}', 'preseason'),
('Cap Room', 'room', '', '{$fran}', '{$nextYear}', 'preseason'),
('Cap Penalties', 'pen', '', '{$fran}', '{$nextYear}', 'preseason'),
('Team Salary', 'salary', '', '{$fran}', '{$nextYear}', 'preseason'),
('NFL Icons', 'icons', '', '{$fran}', '{$nextYear}', 'preseason'),
('Rivals', 'rivals', '', '{$fran}', '{$nextYear}', 'preseason')";
db_query($PopulateInfoTable);


$CopyCoachTable = "INSERT INTO `franchise_year_off_coach` (`Name`, `Chg`, `Age`, `Position`, `Moto`, `Eth`, `Off`, `Def`, `Chem`, `Kno`, `OL`, `QB`, `RB`, `WR`, `DL`, `LB`, `DB`, `S`, `P`, `K`,`Historical_ID`,`Year`, `Team`)
SELECT `Name`, `Chg`, `Age`, `Position`, `Moto`, `Eth`, `Off`, `Def`, `Chem`, `Kno`, `OL`, `QB`, `RB`, `WR`, `DL`, `LB`, `DB`, `S`, `P`, `K`,`Historical_ID`,'{$nextYear}', '{$fran}'
FROM `franchise_year_off_coach` WHERE `Year` = {$previousYear} AND `Team`='{$fran}';";
db_query($CopyCoachTable);

$IncrementCoachAge = "UPDATE `franchise_year_off_coach` SET `Age` = `Age` + 1 WHERE `Year` = '{$nextYear}' and Team='{$fran}'";
db_query($IncrementCoachAge);

$PopulateResultsTable = "INSERT INTO `franchise_year_results` (`Week`, `Vs`, `HorA`, `Score`, `Result`, `Divisional`, `Team`, `Year`) VALUES
('Simulated', 'N', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 1', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 2', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 3', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 4', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 5', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 6', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 7', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 8', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 9', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 10', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 11', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 12', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 13', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 14', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 15', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 16', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Week 17', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Wildcard', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Divisional', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Conference', '', '', '', '', '', '{$fran}', '{$nextYear}'),
('Super Bowl', '', '', '', '', '', '{$fran}', '{$nextYear}')";
db_query($PopulateResultsTable);

$PopulateTeamStats = "INSERT INTO `franchise_year_teamstats` (`Identifier`, `Category`, `Value`, `Rank`, `Tied`, `Year`, `Team`) VALUES
(	'TOTAL_YDS_O'	,	'O'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'RUSH_YDS_O'	,	'O'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'PASS_YDS_O'	,	'O'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'TOTAL_YDS_D'	,	'D'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'RUSH_YDS_D'	,	'D'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'PASS_YDS_D'	,	'D'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'3RD_CONV'	,	'E'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'4TH_CONV'	,	'E'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'2PTA'	,	'E'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'TO'	,	'E'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'OFF_PTS'	,	'O'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'DEF_PTS'	,	'D'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'OFF_RZ'	,	'O'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'DEF_RZ'	,	'D'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'RUSH_TDS'	,	'O'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'PASS_TDS'	,	'O'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'SACKS'	,	'D'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'INTS'	,	'D'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'FUMBLES_REC'	,	'D'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'PEN'	,	'E'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'PEN_YDS'	,	'E'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	),
(	'2PT_CONV'	,	'E'	,	''	,	 ''	,	'N'	,	'{$nextYear}'	,	'{$fran}'	)";
db_query($PopulateTeamStats);

/* Depth Chart Table */

$copyDepthCart = "INSERT INTO `franchise_year_roster`
        (`Name`, `Position`, `Overall`, `Age`, `Weapon`, `Acquired`, `Rookie`, `OSU`, `SPD`, `STR`, `AWR`, `AGI`, `ACC`, `CTH`, `CAR`, `JMP`, `BTK`, `TAK`, `THP`, `THA`, `PBK`, `RBK`, `KPW`, `KAC`, `KR`, `IMP`, `STA`, `INJ`, `TGH`, `Historical_ID`, `Team`, `Year`)
        SELECT `Name`, `Position`, `Overall`, `Age`, `Weapon`, `Acquired`, `Rookie`, `OSU`, `SPD`, `STR`, `AWR`, `AGI`, `ACC`, `CTH`, `CAR`, `JMP`, `BTK`, `TAK`, `THP`, `THA`, `PBK`, `RBK`, `KPW`, `KAC`, `KR`, `IMP`, `STA`, `INJ`, `TGH`, `Historical_ID`, '{$fran}', '{$nextYear}'
        FROM `franchise_year_roster` WHERE `Year` = {$previousYear} and Team='{$fran}';";
db_query($copyDepthCart);
 

$IncrementDepthAge = "UPDATE `franchise_year_roster` SET Age = `Age` + 1 WHERE `Year` = '{$nextYear}' and Team='{$fran}'";
db_query($IncrementDepthAge);

//After Copying Depth Chart Table, Remove Staged Retired Players Based on Position
$getStagedRetiredPlayers = db_query("SELECT * FROM `franchise_staging_retired` WHERE Franchise='{$fran}' and Year='{$previousYear}'");
while ($RetiredPlayerRow = $getStagedRetiredPlayers->fetch_assoc()) {
    $getRetiredPlayerInfo = db_query("SELECT * FROM `franchise_year_roster` WHERE Row_ID={$RetiredPlayerRow['PlayerRow']}");
    $retiredPlayerObj = $getRetiredPlayerInfo->fetch_assoc();
    $retiredPOS = $retiredPlayerObj['Position'];
    $removeRetiredPlayer = db_query("DELETE FROM `franchise_year_roster` WHERE Position='{$retiredPOS}' AND Year='{$nextYear}' AND Team='{$fran}'");
}

$emptyRetiredStagingForFranchise = db_query("DELETE FROM `franchise_staging_retired` WHERE Franchise='{$fran}' AND Year='{$previousYear}'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
