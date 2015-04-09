<?php

$fran = $_GET['fran'];
$PrimaryColor;
$SecondaryColor;

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$GetYears = mysql_query("Select * From `franchise_info` where `Franchise`='$fran'", $con) or die(mysql_error());
$YearRow = mysql_fetch_array($GetYears);
$GetYearNum = $YearRow['CurrentYear'];
$YearNum = $GetYearNum + 1;
$NextYearNum = $YearNum + 1;

$SetYear = mysql_query("UPDATE `franchise_info` SET `CurrentYear` = '{$YearNum}' where `Franchise`='$fran'", $con) or die(mysql_error());
$GetColors = mysql_query("Select * From `franchise_info` where `Franchise`='$fran'", $con) or die(mysql_error());

$row = mysql_fetch_array($GetColors);
$PrimaryColor = $row['PrimaryColor'];
$SecondaryColor = $row['SecondaryColor'];

/* | DIRECTORY AND FILE CREATION */
$NewFranStructure = "../../Franchises" . "/" . $fran . "/Year" . $YearNum ."/_Forms";
mkdir($NewFranStructure, 0700, true);


/* Year File Creation */ 
copy("../../Franchises/_New/FRAN_Year#.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#.php");
rename("../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum ."/" . $fran . "_Year" . $YearNum . ".php");
$YearFile = "../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . ".php";
file_put_contents($YearFile,str_replace('NewFran',$fran,file_get_contents($YearFile)));
file_put_contents($YearFile,str_replace('Year#','Year'.$YearNum,file_get_contents($YearFile)));
file_put_contents($YearFile,str_replace('+-',$YearNum,file_get_contents($YearFile)));
file_put_contents($YearFile,str_replace('PrimaryColor',$PrimaryColor,file_get_contents($YearFile)));
file_put_contents($YearFile,str_replace('SecondaryColor',$SecondaryColor,file_get_contents($YearFile)));
fclose($YearFile);

/* Coach File Creation */ 
copy("../../Franchises/_New/FRAN_Year#_Coach_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Coach_Table.php");
rename("../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Coach_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Coach_Table.php");
$CoachFile = "../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Coach_Table.php";
file_put_contents($CoachFile,str_replace('NewFran',$fran,file_get_contents($CoachFile)));
file_put_contents($CoachFile,str_replace('#',$YearNum,file_get_contents($CoachFile)));
fclose($CoachFile);

/* Offseason File Creation */ 
copy("../../Franchises/_New/FRAN_Year#_Offseason_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Offseason_Table.php");
rename("../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Offseason_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Offseason_Table.php");
$OffseasonFile = "../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Offseason_Table.php";
file_put_contents($OffseasonFile,str_replace('NewFran',$fran,file_get_contents($OffseasonFile)));
file_put_contents($OffseasonFile,str_replace('#',$YearNum,file_get_contents($OffseasonFile)));
fclose($OffseasonFile);

/* PreSeason File Creation */ 
copy("../../Franchises/_New/FRAN_Year#_PreSeason_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_PreSeason_Table.php");
rename("../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_PreSeason_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_PreSeason_Table.php");
$PreSeasonFile = "../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_PreSeason_Table.php";
file_put_contents($PreSeasonFile,str_replace('NewFran',$fran,file_get_contents($PreSeasonFile)));
file_put_contents($PreSeasonFile,str_replace('#',$YearNum,file_get_contents($PreSeasonFile)));
fclose($PreSeasonFile);

/* Reg File Creation */ 
copy("../../Franchises/_New/FRAN_Year#_Reg_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Reg_Table.php");
rename("../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Reg_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Reg_Table.php");
$RegFile = "../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Reg_Table.php";
file_put_contents($RegFile,str_replace('NewFran',$fran,file_get_contents($RegFile)));
file_put_contents($RegFile,str_replace('#',$YearNum,file_get_contents($RegFile)));
fclose($RegFile);

/* Roster File Creation */ 
copy("../../Franchises/_New/FRAN_Year#_Roster_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Roster_Table.php");
rename("../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Roster_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Roster_Table.php");
$RosterFile = "../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Roster_Table.php";
file_put_contents($RosterFile,str_replace('NewFran',$fran,file_get_contents($RosterFile)));
file_put_contents($RosterFile,str_replace('#',$YearNum,file_get_contents($RosterFile)));
file_put_contents($RosterFile,str_replace($YearNum.'1','#1',file_get_contents($RosterFile)));
file_put_contents($RosterFile,str_replace($YearNum.'2','#2',file_get_contents($RosterFile)));
file_put_contents($RosterFile,str_replace($YearNum.'3','#3',file_get_contents($RosterFile)));
file_put_contents($RosterFile,str_replace($YearNum.'4','#4',file_get_contents($RosterFile)));
fclose($RosterFile);

/* Individual Stats File Creation */ 
copy("../../Franchises/_New/FRAN_Year#_Stats_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Stats_Table.php");
rename("../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Stats_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Stats_Table.php");
$StatsFile = "../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Stats_Table.php";
file_put_contents($StatsFile,str_replace('NewFran',$fran,file_get_contents($StatsFile)));
file_put_contents($StatsFile,str_replace('#',$YearNum,file_get_contents($StatsFile)));
fclose($StatsFile);

/* Team Stats File Creation */ 
copy("../../Franchises/_New/FRAN_Year#_Team_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Team_Table.php");
rename("../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/FRAN_Year#_Team_Table.php","../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Team_Table.php");
$TeamStatsFile = "../../Franchises" . "/" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . "_Team_Table.php";
file_put_contents($TeamStatsFile,str_replace('NewFran',$fran,file_get_contents($TeamStatsFile)));
file_put_contents($TeamStatsFile,str_replace('#',$YearNum,file_get_contents($TeamStatsFile)));
fclose($TeamStatsFile);

/* Roster Form File Creation */ 
copy("../../Franchises/_New/Fran_Year#_RosterForms.php","../../Franchises" . "/" . $fran . "/Year".$YearNum."/_Forms/" . $fran . "_Year".$YearNum."_RosterForms.php");
$RosterFormsFile = "../../Franchises" . "/" . $fran . "/Year".$YearNum."/_Forms/" . $fran . "_Year".$YearNum."_RosterForms.php";
file_put_contents($RosterFormsFile,str_replace('NewFran',$fran,file_get_contents($RosterFormsFile)));
file_put_contents($RosterFormsFile,str_replace('#',$YearNum,file_get_contents($RosterFormsFile)));
fclose($RosterFormsFile);

/* Stat Form File Creation */ 
copy("../../Franchises/_New/Fran_Year#_StatsForms.php","../../Franchises" . "/" . $fran . "/Year".$YearNum."/_Forms/" . $fran . "_Year".$YearNum."_StatsForms.php");
$StatFormsFile = "../../Franchises" . "/" . $fran . "/Year".$YearNum."/_Forms/" . $fran . "_Year".$YearNum."_StatsForms.php";
file_put_contents($StatFormsFile,str_replace('NewFran',$fran,file_get_contents($StatFormsFile)));
file_put_contents($StatFormsFile,str_replace('#',$YearNum,file_get_contents($StatFormsFile)));
fclose($StatFormsFile);

/* Offseason Form File Creation */ 
copy("../../Franchises/_New/Fran_Year#_OffseasonForms.php","../../Franchises" . "/" . $fran . "/Year".$YearNum."/_Forms/" . $fran . "_Year".$YearNum."_OffseasonForms.php");
$OffseasonFormsFile = "../../Franchises" . "/" . $fran . "/Year".$YearNum."/_Forms/" . $fran . "_Year".$YearNum."_OffseasonForms.php";
file_put_contents($OffseasonFormsFile,str_replace('NewFran',$fran,file_get_contents($OffseasonFormsFile)));
file_put_contents($OffseasonFormsFile,str_replace('#',$YearNum,file_get_contents($OffseasonFormsFile)));
fclose($OffseasonFormsFile);

/* | DATABASE TABLE CREATION | */

/* Info Table */
$InfoTable = "CREATE TABLE IF NOT EXISTS `gm_madden08-{$fran}_{$YearNum}_info` (
  `Row` int(3) NOT NULL AUTO_INCREMENT,
  `Field` varchar(150) NOT NULL,
  `Value` varchar(150) NOT NULL,
  `Preseason` varchar(1) NOT NULL,
  PRIMARY KEY (`Row`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23";
mysql_query($InfoTable);

$PopulateInfoTable = "INSERT INTO `gm_madden08-{$fran}_{$YearNum}_info` (`Row`, `Field`, `Value`, `Preseason`) VALUES
(10, 'Abbrev', '{$fran}', 'N'),
(11, 'TeamName', '', 'N'),
(12, 'Asset', '', 'N'),
(13, 'SimReg', '', 'N'),
(14, 'TrainStaff', '', 'N'),
(15, 'Relocation', '', 'N'),
(17, 'Salary Cap', '', 'Y'),
(18, 'Cap Room', '', 'Y'),
(19, 'Cap Penalties', '', 'Y'),
(20, 'Team Salary', '', 'Y'),
(21, 'NFL Icons', '', 'Y'),
(22, 'Rivals', '', 'Y')";
mysql_query($PopulateInfoTable);

/* Offseason Table */
$OffseasonTable = "CREATE TABLE IF NOT EXISTS `gm_madden08-{$fran}_{$YearNum}_offseason` (
  `Row` int(3) NOT NULL AUTO_INCREMENT,
  `Player` varchar(150) NOT NULL,
  `Type` varchar(150) NOT NULL,
  `Award` varchar(150) NOT NULL,
  `Position` varchar(150) NOT NULL,
  `Overall` varchar(2) NOT NULL,
  `Pick` varchar(150) NOT NULL,
  `Age` varchar(50) NOT NULL,
  UNIQUE KEY `Row` (`Row`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10";
mysql_query($OffseasonTable);

/* Offseason-Coach Table */
$CoachTable = "CREATE TABLE IF NOT EXISTS `gm_madden08-{$fran}_{$YearNum}_offseason-coach` (
  `Row` varchar(2) NOT NULL,
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
  UNIQUE KEY `Row` (`Row`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
mysql_query($CoachTable);

$PopulateCoachTable = "INSERT INTO `gm_madden08-{$fran}_{$YearNum}_offseason-coach` (`Row`, `Name`, `Chg`, `Age`, `Position`, `Moto`, `Eth`, `Off`, `Def`, `Chem`, `Kno`, `OL`, `QB`, `RB`, `WR`, `DL`, `LB`, `DB`, `S`, `P`, `K`) VALUES
('01', '', '', '', 'HC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('02', '', '', '', 'OC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('03', '', '', '', 'DC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('04', '', '', '', 'ST', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
mysql_query($PopulateCoachTable);

/* Regular Season Table */
$RegularSeasonTable = "CREATE TABLE IF NOT EXISTS `gm_madden08-{$fran}_{$YearNum}_reg` (
  `Row` varchar(2) NOT NULL,
  `Week` varchar(20) NOT NULL,
  `Vs` varchar(50) NOT NULL,
  `HorA` varchar(50) NOT NULL,
  `Score` varchar(50) NOT NULL,
  `Result` varchar(1) NOT NULL,
  `OvrRecord` varchar(10) NOT NULL,
  `DivRecord` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
mysql_query($RegularSeasonTable);

$PopulateRegTable = "INSERT INTO `gm_madden08-{$fran}_{$YearNum}_reg` (`Row`, `Week`, `Vs`, `HorA`, `Score`, `Result`, `OvrRecord`, `DivRecord`) VALUES
('01', 'Week 1', '', '', '', '', '', ''),
('02', 'Week 2', '', '', '', '', '', ''),
('03', 'Week 3', '', '', '', '', '', ''),
('04', 'Week 4', '', '', '', '', '', ''),
('05', 'Week 5', '', '', '', '', '', ''),
('06', 'Week 6', '', '', '', '', '', ''),
('07', 'Week 7', '', '', '', '', '', ''),
('08', 'Week 8', '', '', '', '', '', ''),
('09', 'Week 9', '', '', '', '', '', ''),
('10', 'Week 10', '', '', '', '', '', ''),
('11', 'Week 11', '', '', '', '', '', ''),
('12', 'Week 12', '', '', '', '', '', ''),
('13', 'Week 13', '', '', '', '', '', ''),
('14', 'Week 14', '', '', '', '', '', ''),
('15', 'Week 15', '', '', '', '', '', ''),
('16', 'Week 16', '', '', '', '', '', ''),
('17', 'Week 17', '', '', '', '', '', ''),
('18', 'Wildcard', '', '', '', '', '', ''),
('19', 'Divisional', '', '', '', '', '', ''),
('20', 'Conference', '', '', '', '', '', ''),
('21', 'Super Bowl', '', '', '', '', '', '')";
mysql_query($PopulateRegTable);

/* Team Stats Table */
$TeamStatsTable = "CREATE TABLE IF NOT EXISTS `gm_madden08-{$fran}_{$YearNum}_reg-team` (
  `Row` varchar(2) NOT NULL,
  `Stat` varchar(50) NOT NULL,
  `Value` varchar(50) NOT NULL,
  UNIQUE KEY `Row` (`Row`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
mysql_query($TeamStatsTable);

$PopulateTeamStats = "INSERT INTO `gm_madden08-{$fran}_{$YearNum}_reg-team` (`Row`, `Stat`, `Value`) VALUES
('01', 'Total Offense', 'Yds [ Rank / 32 ]'),
('02', 'Rush Offence', 'Yds [ Rank / 32 ]'),
('03', 'Pass Offense', 'Yds [ Rank / 32 ]'),
('04', 'Total Defense ', 'Yds [ Rank / 32 ]'),
('05', 'Rush Defense', 'Yds [ Rank / 32 ]'),
('06', 'Pass Defense', 'Yds [ Rank / 32 ]'),
('07', '3rd Down Conversion Percent', '%'),
('08', '4th Down Conversion Percent', '%'),
('09', '2 Point Conversion Attempts', '#'),
('10', '2 Point Conversion Percentage', '%'),
('11', 'Turnover Margin (+/-)', '#'),
('12', 'Points Per Game', '#'),
('13', 'Points Against Per Game', '#'),
('14', 'Offensive Red Zone Scoring Percent', '%'),
('15', 'Defensive Red Zone Scoring Percent', '%'),
('19', 'Rushing TDs', '#'),
('20', 'Passing TDs', '#'),
('26', 'Sacks', '#'),
('27', 'Interceptions', '#'),
('28', 'Fumbles Recovered', '#'),
('29', 'Penalties ', '[# - yds ]')";
mysql_query($PopulateTeamStats);

/* Roster Table */
mysql_query("CREATE Table `gm_madden08-{$fran}_{$YearNum}_roster` LIKE `gm_madden08-{$fran}_{$GetYearNum}_roster`");
mysql_query("INSERT INTO `gm_madden08-{$fran}_{$YearNum}_roster` SELECT * FROM `gm_madden08-{$fran}_{$GetYearNum}_roster`");
mysql_query("UPDATE `gm_madden08-{$fran}_{$YearNum}_roster` SET `Age` = `Age` + 1");

$StatsTable = "CREATE TABLE IF NOT EXISTS `gm_madden08-{$fran}_{$YearNum}_stats` (
  `Row` int(3) NOT NULL AUTO_INCREMENT,
  `Player` varchar(150) NOT NULL,
  `Category` varchar(150) NOT NULL,
  `Rating` varchar(150) NOT NULL,
  `Yds` varchar(150) NOT NULL,
  `TDs` varchar(150) NOT NULL,
  `INTs` varchar(150) NOT NULL,
  `Percent` varchar(150) NOT NULL,
  `Sacks` varchar(150) NOT NULL,
  `AVG` varchar(150) NOT NULL,
  `Fumbles` varchar(150) NOT NULL,
  `BrokenTackles` varchar(150) NOT NULL,
  `Longest` varchar(150) NOT NULL,
  `Rec` varchar(150) NOT NULL,
  `Dropped` varchar(150) NOT NULL,
  `Pancakes` varchar(150) NOT NULL,
  `Tackles` varchar(150) NOT NULL,
  `ForLoss` varchar(150) NOT NULL,
  `Safety` varchar(150) NOT NULL,
  `Made` varchar(150) NOT NULL,
  `Attempted` varchar(150) NOT NULL,
  `KPS` varchar(150) NOT NULL,
  `KickPercent` varchar(50) NOT NULL,
  PRIMARY KEY (`Row`),
  UNIQUE KEY `Row` (`Row`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10";
mysql_query($StatsTable);


header('Location: ' . $_SERVER['HTTP_REFERER']);
