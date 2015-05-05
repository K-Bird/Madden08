<?php

$fran = $_POST['fran'];
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

$SetYear = mysql_query("UPDATE `franchise_info` SET `CurrentYear` = '{$YearNum}' where `Franchise`='$fran'", $con) or die(mysql_error());
$GetColors = mysql_query("Select * From `franchise_info` where `Franchise`='$fran'", $con) or die(mysql_error());

$row = mysql_fetch_array($GetColors);
$PrimaryColor = $row['PrimaryColor'];
$SecondaryColor = $row['SecondaryColor'];

/* | DIRECTORY AND FILE CREATION */
$NewFranStructure = "../../Franchises" . "/" . $fran . "/Year" . $YearNum;
mkdir($NewFranStructure, 0700, true);

/* Year File Creation */ 
copy("..\_new_fran/FRAN_Year#.php","../" . $fran . "/Year" . $YearNum . "/FRAN_Year#.php");
rename("../" . $fran . "/Year" . $YearNum . "/FRAN_Year#.php","../" . $fran . "/Year" . $YearNum ."/" . $fran . "_Year" . $YearNum . ".php");
$YearFile = "../" . $fran . "/Year" . $YearNum . "/" . $fran . "_Year" . $YearNum . ".php";
file_put_contents($YearFile,str_replace('NewFran',$fran,file_get_contents($YearFile)));
file_put_contents($YearFile,str_replace('+-',$YearNum,file_get_contents($YearFile)));
file_put_contents($YearFile,str_replace('PrimaryColor',$PrimaryColor,file_get_contents($YearFile)));

/* Coaching Staff File Creation */ 
copy("../_new_fran/FRAN_Year#_CoachingStaff_Table.php","../" . $fran . "/Year".$YearNum."/FRAN_Year#_CoachingStaff_Table.php");
rename("../" . $fran . "/Year".$YearNum."/FRAN_Year#_CoachingStaff_Table.php","../" . $fran . "/Year".$YearNum."/" . $fran . "_Year".$YearNum."_CoachingStaff_Table.php");

/* Offseason File Creation */ 
copy("../_new_fran/FRAN_Year#_Off_Table.php","../" . $fran . "/Year".$YearNum."/FRAN_Year#_Off_Table.php");
rename("../" . $fran . "/Year".$YearNum."/FRAN_Year#_Off_Table.php","../" . $fran . "/Year".$YearNum."/" . $fran . "_Year".$YearNum."_Off_Table.php");

/* PreSeason File Creation */ 
copy("../_new_fran/FRAN_Year#_PreSeason_Table.php","../" . $fran . "/Year".$YearNum."/FRAN_Year#_PreSeason_Table.php");
rename("../" . $fran . "/Year".$YearNum."/FRAN_Year#_PreSeason_Table.php","../" . $fran . "/Year".$YearNum."/" . $fran . "_Year".$YearNum."_PreSeason_Table.php");

/* Regular Season Results File Creation */ 
copy("../_new_fran/FRAN_Year#_Results_Table.php","../" . $fran . "/Year".$YearNum."/FRAN_Year#_Results_Table.php");
rename("../" . $fran . "/Year".$YearNum."/FRAN_Year#_Results_Table.php","../" . $fran . "/Year".$YearNum."/" . $fran . "_Year".$YearNum."_Results_Table.php");

/* Depth Chart File Creation */ 
copy("../_new_fran/FRAN_Year#_DepthChart_Table.php","../" . $fran . "/Year".$YearNum."/FRAN_Year#_DepthChart_Table.php");
rename("../" . $fran . "/Year".$YearNum."/FRAN_Year#_DepthChart_Table.php","../" . $fran . "/Year".$YearNum."/" . $fran . "_Year".$YearNum."_DepthChart_Table.php");

/* Individual Stats File Creation */ 
copy("../_new_fran/FRAN_Year#_IndvStats_Table.php","../" . $fran . "/Year".$YearNum."/FRAN_Year#_IndvStats_Table.php");
rename("../" . $fran . "/Year".$YearNum."/FRAN_Year#_IndvStats_Table.php","../" . $fran . "/Year".$YearNum."/" . $fran . "_Year".$YearNum."_IndvStats_Table.php");

/* Team Stats File Creation */ 
copy("../_new_fran/FRAN_Year#_TeamStats_Table.php","../" . $fran . "/Year".$YearNum."/FRAN_Year#_TeamStats_Table.php");
rename("../" . $fran . "/Year".$YearNum."/FRAN_Year#_TeamStats_Table.php","../" . $fran . "/Year".$YearNum."/" . $fran . "_Year".$YearNum."_TeamStats_Table.php");

/* | DATABASE TABLES CREATION | */

$PopulateCoachingStaffTable = "INSERT INTO `{$fran}_coaches` (`Name`, `Title`, `Year`) VALUES
('','HC','{$YearNum}'),
('','OC','{$YearNum}'),
('','DC','{$YearNum}'),
('','ST','{$YearNum}');";
mysql_query($PopulateCoachingStaffTable);

$PopulateInfoTable = "INSERT INTO `{$fran}_info` (`Field`, `Identify`, `Value`, `Year`, `Preseason`) VALUES
('Team Assets', 'asset', '', '{$YearNum}', 'N'),
('Regular Season Simulated', 'regsim', '', '{$YearNum}', 'N'),
('Training Staff', 'train', '', '{$YearNum}', 'N'),
('Team Relocated', 'relo', 'No', '{$YearNum}', 'N'),
('Salary Cap', 'cap', '', '{$YearNum}', 'Y'),
('Cap Room', 'room', '', '{$YearNum}', 'Y'),
('Cap Penalties', 'pen', '', '{$YearNum}', 'Y'),
('Team Salary', 'salary', '', '{$YearNum}', 'Y'),
('NFL Icons', 'icons', '', '{$YearNum}', 'Y'),
('Rivals', 'rivals', '', '{$YearNum}', 'Y')";
mysql_query($PopulateInfoTable);

$CopyCoachTable = "INSERT INTO `{$fran}_off_coach-chg` (`Name`, `Chg`, `Age`, `Position`, `Moto`, `Eth`, `Off`, `Def`, `Chem`, `Kno`, `OL`, `QB`, `RB`, `WR`, `DL`, `LB`, `DB`, `S`, `P`, `K`,`Historical_ID`,`Year`)
SELECT `Name`, `Chg`, `Age`, `Position`, `Moto`, `Eth`, `Off`, `Def`, `Chem`, `Kno`, `OL`, `QB`, `RB`, `WR`, `DL`, `LB`, `DB`, `S`, `P`, `K`,`Historical_ID`,'$YearNum'
FROM `{$fran}_off_coach-chg` WHERE `Year` = {$GetYearNum};";
mysql_query($CopyCoachTable);

$IncrementCoachAge = "UPDATE `{$fran}_coach-chg` SET `Age` = `Age` + 1 WHERE `Year` = '$YearNum'";

mysql_query($IncrementCoachAge);

$PopulateResultsTable = "INSERT INTO `{$fran}_results` (`Week`, `Vs`, `HorA`, `Score`, `Result`, `OvrRecord`, `DivRecord`, `Year`) VALUES
('Week 1', '', '', '', '', '', '','{$YearNum}'),
('Week 2', '', '', '', '', '', '','{$YearNum}'),
('Week 3', '', '', '', '', '', '','{$YearNum}'),
('Week 4', '', '', '', '', '', '','{$YearNum}'),
('Week 5', '', '', '', '', '', '','{$YearNum}'),
('Week 6', '', '', '', '', '', '','{$YearNum}'),
('Week 7', '', '', '', '', '', '','{$YearNum}'),
('Week 8', '', '', '', '', '', '','{$YearNum}'),
('Week 9', '', '', '', '', '', '','{$YearNum}'),
('Week 10', '', '', '', '', '', '','{$YearNum}'),
('Week 11', '', '', '', '', '', '','{$YearNum}'),
('Week 12', '', '', '', '', '', '','{$YearNum}'),
('Week 13', '', '', '', '', '', '','{$YearNum}'),
('Week 14', '', '', '', '', '', '','{$YearNum}'),
('Week 15', '', '', '', '', '', '','{$YearNum}'),
('Week 16', '', '', '', '', '', '','{$YearNum}'),
('Week 17', '', '', '', '', '', '','{$YearNum}'),
('Wildcard', '', '', '', '', '', '','{$YearNum}'),
('Divisional', '', '', '', '', '', '','{$YearNum}'),
('Conference', '', '', '', '', '', '','{$YearNum}'),
('Super Bowl', '', '', '', '', '', '','{$YearNum}')";
mysql_query($PopulateResultsTable);

$PopulateTeamStats = "INSERT INTO `{$fran}_teamstats` (`Stat`, `Value`, `Rank`, `Year`) VALUES
('Total Offense', '', '', '{$YearNum}'),
('Rush Offence', '', '', '{$YearNum}'),
('Pass Offense', '', '', '{$YearNum}'),
('Total Defense ', '', '', '{$YearNum}'),
('Rush Defense', '', '', '{$YearNum}'),
('Pass Defense', '', '', '{$YearNum}'),
('3rd Down Conversion Percent', '', '', '{$YearNum}'),
('4th Down Conversion Percent', '', '', '{$YearNum}'),
('2 Point Conversion Attempts', '', '', '{$YearNum}'),
('2 Point Conversion Percentage', '', '', '{$YearNum}'),
('Turnover Margin (+/-)', '', '', '{$YearNum}'),
('Points Per Game', '', '', '{$YearNum}'),
('Points Against Per Game', '', '', '{$YearNum}'),
('Offensive Red Zone Scoring Percent', '', '', '{$YearNum}'),
('Defensive Red Zone Scoring Percent', '', '', '{$YearNum}'),
('Rushing TDs', '', '', '{$YearNum}'),
('Passing TDs', '', '', '{$YearNum}'),
('Sacks', '', '', '{$YearNum}'),
('Interceptions', '', '', '{$YearNum}'),
('Fumbles Recovered', '', '', '{$YearNum}'),
('Penalties Commited', '', '', '{$YearNum}'),
('Penalty Yards', '', '', '{$YearNum}')";
mysql_query($PopulateTeamStats);


/* Depth Chart Table */
$copyDepthCart = "INSERT INTO `{$fran}_players`
        (`Name`, `Position`, `Overall`, `Age`, `Weapon`, `OnTeam`, `Rookie`, `OSU`, `Historical_ID`, `Year`)
        SELECT `Name`, `Position`, `Overall`, `Age`, `Weapon`, `OnTeam`, `Rookie`, `OSU`, `Historical_ID`, '$YearNum'
        FROM `{$fran}_players` WHERE `Year` = {$GetYearNum};";
mysql_query($copyDepthCart);

$IncrementDepthAge = "UPDATE `{$fran}_players` SET `Age` = `Age` + 1 WHERE `Year` = '$YearNum'";
mysql_query($IncrementDepthAge);

header('Location: ' . $_SERVER['HTTP_REFERER']);