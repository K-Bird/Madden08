<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$fran = $_POST['fran'];
$PrimaryColor;
$SecondaryColor;

$Activate = db_query("UPDATE `franchise_info` SET `Active` = 'Y' where `Franchise`='$fran'");
$SetYear = db_query("UPDATE `franchise_info` SET `CurrentYear` = '1' where `Franchise`='$fran'");
$GetColors = db_query("Select * From `franchise_info` where `Franchise`='$fran'");

$row = $GetColors->fetch_assoc();
$PrimaryColor = $row['PrimaryColor']; 
$SecondaryColor = $row['SecondaryColor'];
$FullName = $row['FullName'];

/* | DATABASE TABLES CREATION | */

$PopulateCoachingStaffTable = "INSERT INTO `franchise_year_pre_coaches` (`Name`, `Position`, `Year`, `Team`) VALUES
('','HC', '1', '{$fran}'),
('','OC', '1', '{$fran}'),
('','DC', '1', '{$fran}'),
('','ST', '1', '{$fran}')";
db_query($PopulateCoachingStaffTable);

$PopulateInfoTable = "INSERT INTO `franchise_year_info` (`Field_Display`, `Field_ID`, `Field_Value`, `Franchise`, `Year`, `Section`) VALUES
('Salary Cap', 'cap', '', '{$fran}', 1, 'preseason'),
('Cap Room', 'room', '', '{$fran}', 1, 'preseason'),
('Cap Penalties', 'pen', '', '{$fran}', 1, 'preseason'),
('Team Salary', 'salary', '', '{$fran}', 1, 'preseason'),
('NFL Icons', 'icons', '', '{$fran}', 1, 'preseason'),
('Rivals', 'rivals', '', '{$fran}', 1, 'preseason')";
db_query($PopulateInfoTable);

$PopulateCoachTable = "INSERT INTO `franchise_year_off_coach` (`Name`, `Chg`, `Age`, `Position`, `Moto`, `Eth`, `Off`, `Def`, `Chem`, `Kno`, `OL`, `QB`, `RB`, `WR`, `DL`, `LB`, `DB`, `S`, `P`, `K`,`Historical_ID`,`Year`, `Team`) VALUES
('', '', '', 'HC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','1','1', '{$fran}'),
('', '', '', 'OC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','2','1', '{$fran}'),
('', '', '', 'DC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','3','1', '{$fran}'),
('', '', '', 'ST', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','4','1', '{$fran}')";
db_query($PopulateCoachTable);

$PopulateResultsTable = "INSERT INTO `franchise_year_results` (`Week`, `Vs`, `HorA`, `Score`, `Result`, `Divisional`, `Team`, `Year`) VALUES
('Simulated', '', '', '', '', '', '{$fran}', '1'),
('Week 1', '', '', '', '', '', '{$fran}', '1'),
('Week 2', '', '', '', '', '', '{$fran}', '1'),
('Week 3', '', '', '', '', '', '{$fran}', '1'),
('Week 4', '', '', '', '', '', '{$fran}', '1'),
('Week 5', '', '', '', '', '', '{$fran}', '1'),
('Week 6', '', '', '', '', '', '{$fran}', '1'),
('Week 7', '', '', '', '', '', '{$fran}', '1'),
('Week 8', '', '', '', '', '', '{$fran}', '1'),
('Week 9', '', '', '', '', '', '{$fran}', '1'),
('Week 10', '', '', '', '', '', '{$fran}', '1'),
('Week 11', '', '', '', '', '', '{$fran}', '1'),
('Week 12', '', '', '', '', '', '{$fran}', '1'),
('Week 13', '', '', '', '', '', '{$fran}', '1'),
('Week 14', '', '', '', '', '', '{$fran}', '1'),
('Week 15', '', '', '', '', '', '{$fran}', '1'),
('Week 16', '', '', '', '', '', '{$fran}', '1'),
('Week 17', '', '', '', '', '', '{$fran}', '1'),
('Wildcard', '', '', '', '', '', '{$fran}', '1'),
('Divisional', '', '', '', '', '', '{$fran}', '1'),
('Conference', '', '', '', '', '', '{$fran}', '1'),
('Super Bowl', '', '', '', '', '', '{$fran}', '1')";
db_query($PopulateResultsTable);

$PopulateTeamStats = "INSERT INTO `franchise_year_teamstats` (`Identifier`, `Category`, `Value`, `Rank`, `Tied`, `Year`, `Team`) VALUES
(	'TOTAL_YDS_O'	,	'O'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'RUSH_YDS_O'	,	'O'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'PASS_YDS_O'	,	'O'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'TOTAL_YDS_D'	,	'D'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'RUSH_YDS_D'	,	'D'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'PASS_YDS_D'	,	'D'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'3RD_CONV'	,	'E'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'4TH_CONV'	,	'E'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'2PTA'	,	'E'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'TO'	,	'E'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'OFF_PTS'	,	'O'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'DEF_PTS'	,	'D'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'OFF_RZ'	,	'O'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'DEF_RZ'	,	'D'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'RUSH_TDS'	,	'O'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'PASS_TDS'	,	'O'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'SACKS'	,	'D'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'INTS'	,	'D'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'FUMBLES_REC'	,	'D'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'PEN'	,	'E'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'PEN_YDS'	,	'E'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	),
(	'2PT_CONV'	,	'E'	,	''	,	 ''	,	'N'	,	'1'	,	'{$fran}'	)";
db_query($PopulateTeamStats);

header('Location: ' . $_SERVER['HTTP_REFERER']);
