<?php

$fran = $_POST['fran'];
$PrimaryColor;
$SecondaryColor;

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Activate = mysql_query("UPDATE `franchise_info` SET `Active` = 'Y' where `Franchise`='$fran'", $con) or die(mysql_error());
$SetYear = mysql_query("UPDATE `franchise_info` SET `CurrentYear` = '1' where `Franchise`='$fran'", $con) or die(mysql_error());
$GetColors = mysql_query("Select * From `franchise_info` where `Franchise`='$fran'", $con) or die(mysql_error());

$row = mysql_fetch_array($GetColors);
$PrimaryColor = $row['PrimaryColor'];
$SecondaryColor = $row['SecondaryColor'];
$FullName = $row['FullName'];

/* | DIRECTORY AND FILE CREATION */
$NewFranStructure = "../" . $fran . "/Year1";
mkdir($NewFranStructure, 0700, true);

/* Modify Franchise File */
copy("../_new_fran/Fran_Active.php","../" . $fran . "/FRAN_Active.php");
rename("../" . $fran . "/FRAN_Active.php","../" . $fran . "/Fran_" . $fran . ".php");
$ActiveFranFile = "../" . $fran . "/Fran_" . $fran . ".php";
file_put_contents($ActiveFranFile,str_replace('NewFran',$fran,file_get_contents($ActiveFranFile)));
file_put_contents($ActiveFranFile,str_replace('FullName',$FullName,file_get_contents($ActiveFranFile)));

/* Year File Creation */ 
copy("../_new_fran/FRAN_Year#.php","../" . $fran . "/Year1/FRAN_Year#.php");
rename("../" . $fran . "/Year1/FRAN_Year#.php","../" . $fran . "/Year1/" . $fran . "_Year1.php");
$YearFile = "../" . $fran . "/Year1/" . $fran . "_Year1.php";
file_put_contents($YearFile,str_replace('NewFran',$fran,file_get_contents($YearFile)));
file_put_contents($YearFile,str_replace('+-','1',file_get_contents($YearFile)));
file_put_contents($YearFile,str_replace('PrimaryColor',$PrimaryColor,file_get_contents($YearFile)));

/* Coaching Staff File Creation */ 
copy("../_new_fran/FRAN_Year#_CoachingStaff_Table.php","../" . $fran . "/Year1/FRAN_Year#_CoachingStaff_Table.php");
rename("../" . $fran . "/Year1/FRAN_Year#_CoachingStaff_Table.php","../" . $fran . "/Year1/" . $fran . "_Year1_CoachingStaff_Table.php");

/* Offseason File Creation */ 
copy("../_new_fran/FRAN_Year#_Off_Table.php","../" . $fran . "/Year1/FRAN_Year#_Off_Table.php");
rename("../" . $fran . "/Year1/FRAN_Year#_Off_Table.php","../" . $fran . "/Year1/" . $fran . "_Year1_Off_Table.php");

/* PreSeason File Creation */ 
copy("../_new_fran/FRAN_Year#_PreSeason_Table.php","../" . $fran . "/Year1/FRAN_Year#_PreSeason_Table.php");
rename("../" . $fran . "/Year1/FRAN_Year#_PreSeason_Table.php","../" . $fran . "/Year1/" . $fran . "_Year1_PreSeason_Table.php");

/* Regular Season Results File Creation */ 
copy("../_new_fran/FRAN_Year#_Results_Table.php","../" . $fran . "/Year1/FRAN_Year#_Results_Table.php");
rename("../" . $fran . "/Year1/FRAN_Year#_Results_Table.php","../" . $fran . "/Year1/" . $fran . "_Year1_Results_Table.php");

/* Depth Chart File Creation */ 
copy("../_new_fran/FRAN_Year#_DepthChart_Table.php","../" . $fran . "/Year1/FRAN_Year#_DepthChart_Table.php");
rename("../" . $fran . "/Year1/FRAN_Year#_DepthChart_Table.php","../" . $fran . "/Year1/" . $fran . "_Year1_DepthChart_Table.php");

/* Individual Stats File Creation */ 
copy("../_new_fran/FRAN_Year#_IndvStats_Table.php","../" . $fran . "/Year1/FRAN_Year#_IndvStats_Table.php");
rename("../" . $fran . "/Year1/FRAN_Year#_IndvStats_Table.php","../" . $fran . "/Year1/" . $fran . "_Year1_IndvStats_Table.php");

/* Team Stats File Creation */ 
copy("../_new_fran/FRAN_Year#_TeamStats_Table.php","../" . $fran . "/Year1/FRAN_Year#_TeamStats_Table.php");
rename("../" . $fran . "/Year1/FRAN_Year#_TeamStats_Table.php","../" . $fran . "/Year1/" . $fran . "_Year1_TeamStats_Table.php");

/* | DATABASE TABLES CREATION | */

/* Coaching Staff Table */
$createCoachingStaffTable = "CREATE TABLE IF NOT EXISTS `{$fran}_coaches` (
`Row` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Name` varchar(100) NOT NULL,
  `Title` varchar(2) NOT NULL,
  `Year` varchar(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createCoachingStaffTable);

$PopulateCoachingStaffTable = "INSERT INTO `{$fran}_coaches` (`Name`, `Title`, `Year`) VALUES
('','HC','1'),
('','OC','1'),
('','DC','1'),
('','ST','1')";
mysql_query($PopulateCoachingStaffTable);

/* Info Table */
$createInfoTable = "CREATE TABLE IF NOT EXISTS `{$fran}_info` (
`Row` int(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Field` varchar(150) NOT NULL,
  `Identify` varchar(6) NOT NULL,
  `Value` varchar(150) NOT NULL,
  `Year` int(2) NOT NULL,
  `Preseason` varchar(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createInfoTable);

$PopulateInfoTable = "INSERT INTO `{$fran}_info` (`Field`, `Identify`, `Value`, `Year`, `Preseason`) VALUES
('Team Assets', 'asset', '', 1, 'N'),
('Regular Season Simulated', 'regsim', '', 1, 'N'),
('Training Staff', 'train', '', 1, 'N'),
('Team Relocated', 'relo', 'No', 1, 'N'),
('Salary Cap', 'cap', '', 1, 'Y'),
('Cap Room', 'room', '', 1, 'Y'),
('Cap Penalties', 'pen', '', 1, 'Y'),
('Team Salary', 'salary', '', 1, 'Y'),
('NFL Icons', 'icons', '', 1, 'Y'),
('Rivals', 'rivals', '', 1, 'Y')";
mysql_query($PopulateInfoTable);

/* Offseason Awards Table */
$createOffseasonAwardsTable = "CREATE TABLE IF NOT EXISTS `{$fran}_off_awards` (
`Row` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Player` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Award` varchar(150) NOT NULL,
  `Historical_ID` varchar(4) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createOffseasonAwardsTable);

/* Offseason-Coach Table */
$createOffseasonCoachTable = "CREATE TABLE IF NOT EXISTS `{$fran}_off_coach-chg` (
  `Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Name` varchar(150) NOT NULL,
  `Chg` varchar(150) NOT NULL,
  `Age` varchar(150) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Moto` varchar(2) NOT NULL,
  `Eth` varchar(2) NOT NULL,
  `Off` varchar(2) NOT NULL,
  `Def` varchar(2) NOT NULL,
  `Chem` varchar(2) NOT NULL,
  `Kno` varchar(2) NOT NULL,
  `OL` varchar(2) NOT NULL,
  `QB` varchar(2) NOT NULL,
  `RB` varchar(2) NOT NULL,
  `WR` varchar(2) NOT NULL,
  `DL` varchar(2) NOT NULL,
  `LB` varchar(2) NOT NULL,
  `DB` varchar(2) NOT NULL,
  `S` varchar(2) NOT NULL,
  `P` varchar(2) NOT NULL,
  `K` varchar(2) NOT NULL,
  `Historical_ID` varchar(4) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
mysql_query($createOffseasonCoachTable);

$PopulateCoachTable = "INSERT INTO `{$fran}_off_coach-chg` (`Name`, `Chg`, `Age`, `Position`, `Moto`, `Eth`, `Off`, `Def`, `Chem`, `Kno`, `OL`, `QB`, `RB`, `WR`, `DL`, `LB`, `DB`, `S`, `P`, `K`,`Historical_ID`,`Year`) VALUES
('', '', '', 'HC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','1','1'),
('', '', '', 'OC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','2','1'),
('', '', '', 'DC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','3','1'),
('', '', '', 'ST', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','4','1')";
mysql_query($PopulateCoachTable);

/* Offseason Moves Table */
$createOffseasonMovesTable = "CREATE TABLE IF NOT EXISTS `{$fran}_off_moves` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Player` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Overall` varchar(2) NOT NULL,
  `Age` varchar(2) NOT NULL,
  `Draft` varchar(10) NOT NULL,
  `Year` int(4) NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createOffseasonMovesTable);

/* Probowl Table */
$createProbowlTable = "CREATE TABLE IF NOT EXISTS `{$fran}_off_probowl` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Player` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Historical_ID` varchar(4) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createProbowlTable);

/* Depth Chart Table */
$createDepthChartTable = "CREATE TABLE IF NOT EXISTS `{$fran}_players` (
`Row_ID` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Name` varchar(100) NOT NULL,
  `Position` varchar(5) NOT NULL,
  `Overall` varchar(2) NOT NULL,
  `Age` varchar(2) NOT NULL,
  `Weapon` varchar(20) NOT NULL,
  `OnTeam` varchar(50) NOT NULL,
  `Rookie` varchar(1) NOT NULL,
  `OSU` varchar(1) NOT NULL,
  `Historical_ID` int(3) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createDepthChartTable);

/* Regular Season Results Table */
$RegularSeasonTable = "CREATE TABLE IF NOT EXISTS `{$fran}_results` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Week` varchar(20) NOT NULL,
  `Vs` varchar(50) NOT NULL,
  `HorA` varchar(50) NOT NULL,
  `Score` varchar(50) NOT NULL,
  `Result` varchar(1) NOT NULL,
  `OvrRecord` varchar(10) NOT NULL,
  `DivRecord` varchar(10) NOT NULL,
  `Year` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($RegularSeasonTable);

$PopulateResultsTable = "INSERT INTO `{$fran}_results` (`Week`, `Vs`, `HorA`, `Score`, `Result`, `OvrRecord`, `DivRecord`, `Year`) VALUES
('Week 1', '', '', '', '', '', '','1'),
('Week 2', '', '', '', '', '', '','1'),
('Week 3', '', '', '', '', '', '','1'),
('Week 4', '', '', '', '', '', '','1'),
('Week 5', '', '', '', '', '', '','1'),
('Week 6', '', '', '', '', '', '','1'),
('Week 7', '', '', '', '', '', '','1'),
('Week 8', '', '', '', '', '', '','1'),
('Week 9', '', '', '', '', '', '','1'),
('Week 10', '', '', '', '', '', '','1'),
('Week 11', '', '', '', '', '', '','1'),
('Week 12', '', '', '', '', '', '','1'),
('Week 13', '', '', '', '', '', '','1'),
('Week 14', '', '', '', '', '', '','1'),
('Week 15', '', '', '', '', '', '','1'),
('Week 16', '', '', '', '', '', '','1'),
('Week 17', '', '', '', '', '', '','1'),
('Wildcard', '', '', '', '', '', '','1'),
('Divisional', '', '', '', '', '', '','1'),
('Conference', '', '', '', '', '', '','1'),
('Super Bowl', '', '', '', '', '', '','1')";
mysql_query($PopulateResultsTable);

/* Blocking Stats Table */
$createBlockingTable = "CREATE TABLE IF NOT EXISTS `{$fran}_stats_block` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Player` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Pancakes` varchar(5) NOT NULL,
  `Sacks` varchar(5) NOT NULL,
  `Historical_ID` varchar(5) NOT NULL,
  `Year` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createBlockingTable);

/* Defensive Stats Table */
$createDefStatsTable = "CREATE TABLE IF NOT EXISTS `{$fran}_stats_def` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Player` varchar(50) NOT NULL,
  `Position` varchar(25) NOT NULL,
  `Tackles` varchar(3) NOT NULL,
  `ForLoss` varchar(3) NOT NULL,
  `Sacks` varchar(3) NOT NULL,
  `INTs` varchar(3) NOT NULL,
  `TDs` varchar(3) NOT NULL,
  `Saftey` varchar(3) NOT NULL,
  `Historical_ID` varchar(4) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createDefStatsTable);

/* Passing Stats Table */
$createPassingStats = "CREATE TABLE IF NOT EXISTS `{$fran}_stats_passing` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Player` varchar(150) NOT NULL,
  `Rating` varchar(5) NOT NULL,
  `Yards` varchar(10) NOT NULL,
  `TDs` varchar(5) NOT NULL,
  `INTs` varchar(5) NOT NULL,
  `Comp` varchar(5) NOT NULL,
  `Sacked` varchar(2) NOT NULL,
  `Historical_ID` varchar(4) NOT NULL,
  `Year` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createPassingStats);

/* Receiving Stats Table */
$createRecStatsTable = "CREATE TABLE IF NOT EXISTS `{$fran}_stats_rec` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Player` varchar(50) NOT NULL,
  `Rec` varchar(5) NOT NULL,
  `Yards` varchar(10) NOT NULL,
  `TDs` varchar(5) NOT NULL,
  `YPC` varchar(5) NOT NULL,
  `LongCatch` varchar(5) NOT NULL,
  `Drops` varchar(5) NOT NULL,
  `Historical_ID` varchar(5) NOT NULL,
  `Year` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createRecStatsTable);

/* Rush Stats Table */
$createRushingStatsTable = "CREATE TABLE IF NOT EXISTS `{$fran}_stats_rushing` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Player` varchar(50) NOT NULL,
  `Yards` varchar(5) NOT NULL,
  `TDs` varchar(2) NOT NULL,
  `YPC` varchar(5) NOT NULL,
  `Fumble` varchar(2) NOT NULL,
  `Broken` varchar(5) NOT NULL,
  `LongRun` varchar(5) NOT NULL,
  `Historical_ID` varchar(4) NOT NULL,
  `Year` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createRushingStatsTable);

/* Special Teams Stats Table */
$createSTstatsTable = "CREATE TABLE IF NOT EXISTS `{$fran}_stats_special` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Player` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `FGA` varchar(15) NOT NULL,
  `FGM` varchar(15) NOT NULL,
  `FG_Percent` varchar(15) NOT NULL,
  `Longest_Play` varchar(15) NOT NULL,
  `Punt_AVG` varchar(15) NOT NULL,
  `I20` varchar(15) NOT NULL,
  `Ret_AVG` varchar(15) NOT NULL,
  `Ret_TDs` varchar(15) NOT NULL,
  `Historical_ID` varchar(4) NOT NULL,
  `Year` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createSTstatsTable);

/* Team Stats Table */
$createTeamStatsTable = "CREATE TABLE IF NOT EXISTS `{$fran}_teamstats` (
`Row` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Stat` varchar(50) NOT NULL,
  `Value` varchar(50) NOT NULL,
  `Rank` varchar(15) NOT NULL,
  `Year` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
mysql_query($createTeamStatsTable);

$PopulateTeamStats = "INSERT INTO `{$fran}_teamstats` (`Stat`, `Value`, `Rank`, `Year`) VALUES
('Total Offense', '', '', 1),
('Rush Offence', '', '', 1),
('Pass Offense', '', '', 1),
('Total Defense ', '', '', 1),
('Rush Defense', '', '', 1),
('Pass Defense', '', '', 1),
('3rd Down Conversion Percent', '', '', 1),
('4th Down Conversion Percent', '', '', 1),
('2 Point Conversion Attempts', '', '', 1),
('2 Point Conversion Percentage', '', '', 1),
('Turnover Margin (+/-)', '', '', 1),
('Points Per Game', '', '', 1),
('Points Against Per Game', '', '', 1),
('Offensive Red Zone Scoring Percent', '', '', 1),
('Defensive Red Zone Scoring Percent', '', '', 1),
('Rushing TDs', '', '', 1),
('Passing TDs', '', '', 1),
('Sacks', '', '', 1),
('Interceptions', '', '', 1),
('Fumbles Recovered', '', '', 1),
('Penalties Commited', '', '', 1),
('Penalty Yards', '', '', 1)";
mysql_query($PopulateTeamStats);

header('Location: ' . $_SERVER['HTTP_REFERER']);
