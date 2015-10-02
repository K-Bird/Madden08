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
$previousYear = $YearRow['CurrentYear'];
$nextYear = $previousYear + 1;

$SetYear = mysql_query("UPDATE `franchise_info` SET `CurrentYear` = '{$nextYear}' where `Franchise`='$fran'", $con) or die(mysql_error());
$GetColors = mysql_query("Select * From `franchise_info` where `Franchise`='$fran'", $con) or die(mysql_error());

$row = mysql_fetch_array($GetColors);
$PrimaryColor = $row['PrimaryColor'];
$SecondaryColor = $row['SecondaryColor'];

/* | DIRECTORY AND FILE CREATION */
$NewFranStructure = "../../Franchises" . "/" . $fran . "/Year" . $nextYear;
mkdir($NewFranStructure, 0700, true);

/* Year File Creation */
copy("..\_new_fran/FRAN_Year#.php", "../" . $fran . "/Year" . $nextYear . "/FRAN_Year#.php");
rename("../" . $fran . "/Year" . $nextYear . "/FRAN_Year#.php", "../" . $fran . "/Year" . $nextYear . "/" . $fran . "_Year" . $nextYear . ".php");
$YearFile = "../" . $fran . "/Year" . $nextYear . "/" . $fran . "_Year" . $nextYear . ".php";
file_put_contents($YearFile, str_replace('NewFran', $fran, file_get_contents($YearFile)));
file_put_contents($YearFile, str_replace('+-', $nextYear, file_get_contents($YearFile)));
file_put_contents($YearFile, str_replace('PrimaryColor', $PrimaryColor, file_get_contents($YearFile)));

/* Coaching Staff File Creation */
copy("../_new_fran/FRAN_Year#_CoachingStaff_Table.php", "../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_CoachingStaff_Table.php");
rename("../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_CoachingStaff_Table.php", "../" . $fran . "/Year" . $nextYear . "/" . $fran . "_Year" . $nextYear . "_CoachingStaff_Table.php");

/* Offseason File Creation */
copy("../_new_fran/FRAN_Year#_Off_Table.php", "../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_Off_Table.php");
rename("../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_Off_Table.php", "../" . $fran . "/Year" . $nextYear . "/" . $fran . "_Year" . $nextYear . "_Off_Table.php");

/* PreSeason File Creation */
copy("../_new_fran/FRAN_Year#_PreSeason_Table.php", "../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_PreSeason_Table.php");
rename("../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_PreSeason_Table.php", "../" . $fran . "/Year" . $nextYear . "/" . $fran . "_Year" . $nextYear . "_PreSeason_Table.php");

/* Regular Season Results File Creation */
copy("../_new_fran/FRAN_Year#_Results_Table.php", "../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_Results_Table.php");
rename("../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_Results_Table.php", "../" . $fran . "/Year" . $nextYear . "/" . $fran . "_Year" . $nextYear . "_Results_Table.php");

/* Depth Chart File Creation */
copy("../_new_fran/FRAN_Year#_DepthChart_Table.php", "../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_DepthChart_Table.php");
rename("../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_DepthChart_Table.php", "../" . $fran . "/Year" . $nextYear . "/" . $fran . "_Year" . $nextYear . "_DepthChart_Table.php");

/* Individual Stats File Creation */
copy("../_new_fran/FRAN_Year#_IndvStats_Table.php", "../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_IndvStats_Table.php");
rename("../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_IndvStats_Table.php", "../" . $fran . "/Year" . $nextYear . "/" . $fran . "_Year" . $nextYear . "_IndvStats_Table.php");

/* Team Stats File Creation */
copy("../_new_fran/FRAN_Year#_TeamStats_Table.php", "../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_TeamStats_Table.php");
rename("../" . $fran . "/Year" . $nextYear . "/FRAN_Year#_TeamStats_Table.php", "../" . $fran . "/Year" . $nextYear . "/" . $fran . "_Year" . $nextYear . "_TeamStats_Table.php");

/* | DATABASE TABLES CREATION | */

/* Grab previous year offseason coaches for insertion into next year's coaching staff */
$GetPreviousHC = mysql_query("SELECT Name FROM `{$fran}_off_coach-chg` WHERE Year={$previousYear} and Position='HC'") or die(mysql_error());
$PreviousHCObj = mysql_fetch_object($GetPreviousHC);
$PreviousHC = $PreviousHCObj->Name;

$GetPreviousOC = mysql_query("SELECT Name FROM `{$fran}_off_coach-chg` WHERE Year={$previousYear} and Position='OC'") or die(mysql_error());
$PreviousOCObj = mysql_fetch_object($GetPreviousOC);
$PreviousOC = $PreviousOCObj->Name;

$GetPreviousDC = mysql_query("SELECT Name FROM `{$fran}_off_coach-chg` WHERE Year={$previousYear} and Position='DC'") or die(mysql_error());
$PreviousDCObj = mysql_fetch_object($GetPreviousDC);
$PreviousDC = $PreviousDCObj->Name;

$GetPreviousST = mysql_query("SELECT Name FROM `{$fran}_off_coach-chg` WHERE Year={$previousYear} and Position='ST'") or die(mysql_error());
$PreviousSTObj = mysql_fetch_object($GetPreviousST);
$PreviousST = $PreviousSTObj->Name;

$PopulateCoachingStaffTable = "INSERT INTO `{$fran}_coaches` (`Name`, `Title`, `Year`) VALUES
('{$PreviousHC}','HC','{$nextYear}'),
('{$PreviousOC}','OC','{$nextYear}'),
('{$PreviousDC}','DC','{$nextYear}'),
('{$PreviousST}','ST','{$nextYear}');";
mysql_query($PopulateCoachingStaffTable);

$PopulateInfoTable = "INSERT INTO `{$fran}_info` (`Field`, `Identify`, `Value`, `Year`, `Preseason`) VALUES
('Team Assets', 'asset', '', '{$nextYear}', 'N'),
('Regular Season Simulated', 'regsim', '', '{$nextYear}', 'N'),
('Training Staff', 'train', '', '{$nextYear}', 'N'),
('Team Relocated', 'relo', 'No', '{$nextYear}', 'N'),
('Salary Cap', 'cap', '', '{$nextYear}', 'Y'),
('Cap Room', 'room', '', '{$nextYear}', 'Y'),
('Cap Penalties', 'pen', '', '{$nextYear}', 'Y'),
('Team Salary', 'salary', '', '{$nextYear}', 'Y'),
('NFL Icons', 'icons', '', '{$nextYear}', 'Y'),
('Rivals', 'rivals', '', '{$nextYear}', 'Y')";
mysql_query($PopulateInfoTable);

$CopyCoachTable = "INSERT INTO `{$fran}_off_coach-chg` (`Name`, `Chg`, `Age`, `Position`, `Moto`, `Eth`, `Off`, `Def`, `Chem`, `Kno`, `OL`, `QB`, `RB`, `WR`, `DL`, `LB`, `DB`, `S`, `P`, `K`,`Historical_ID`,`Year`)
SELECT `Name`, `Chg`, `Age`, `Position`, `Moto`, `Eth`, `Off`, `Def`, `Chem`, `Kno`, `OL`, `QB`, `RB`, `WR`, `DL`, `LB`, `DB`, `S`, `P`, `K`,`Historical_ID`,'$nextYear'
FROM `{$fran}_off_coach-chg` WHERE `Year` = {$previousYear};";
mysql_query($CopyCoachTable);

$IncrementCoachAge = "UPDATE `{$fran}_coach-chg` SET `Age` = `Age` + 1 WHERE `Year` = '$nextYear'";

mysql_query($IncrementCoachAge);

$PopulateResultsTable = "INSERT INTO `{$fran}_results` (`Week`, `Vs`, `HorA`, `Score`, `Result`, `OvrRecord`, `DivRecord`, `Year`) VALUES
('Week 1', '', '', '', '', '', '','{$nextYear}'),
('Week 2', '', '', '', '', '', '','{$nextYear}'),
('Week 3', '', '', '', '', '', '','{$nextYear}'),
('Week 4', '', '', '', '', '', '','{$nextYear}'),
('Week 5', '', '', '', '', '', '','{$nextYear}'),
('Week 6', '', '', '', '', '', '','{$nextYear}'),
('Week 7', '', '', '', '', '', '','{$nextYear}'),
('Week 8', '', '', '', '', '', '','{$nextYear}'),
('Week 9', '', '', '', '', '', '','{$nextYear}'),
('Week 10', '', '', '', '', '', '','{$nextYear}'),
('Week 11', '', '', '', '', '', '','{$nextYear}'),
('Week 12', '', '', '', '', '', '','{$nextYear}'),
('Week 13', '', '', '', '', '', '','{$nextYear}'),
('Week 14', '', '', '', '', '', '','{$nextYear}'),
('Week 15', '', '', '', '', '', '','{$nextYear}'),
('Week 16', '', '', '', '', '', '','{$nextYear}'),
('Week 17', '', '', '', '', '', '','{$nextYear}'),
('Wildcard', '', '', '', '', '', '','{$nextYear}'),
('Divisional', '', '', '', '', '', '','{$nextYear}'),
('Conference', '', '', '', '', '', '','{$nextYear}'),
('Super Bowl', '', '', '', '', '', '','{$nextYear}')";
mysql_query($PopulateResultsTable);

$PopulateTeamStats = "INSERT INTO `{$fran}_teamstats` (`Stat`, `Value`, `Rank`, `Year`) VALUES
('Total Offense', '', '', '{$nextYear}'),
('Rush Offence', '', '', '{$nextYear}'),
('Pass Offense', '', '', '{$nextYear}'),
('Total Defense ', '', '', '{$nextYear}'),
('Rush Defense', '', '', '{$nextYear}'),
('Pass Defense', '', '', '{$nextYear}'),
('3rd Down Conversion Percent', '', '', '{$nextYear}'),
('4th Down Conversion Percent', '', '', '{$nextYear}'),
('2 Point Conversion Attempts', '', '', '{$nextYear}'),
('2 Point Conversion Percentage', '', '', '{$nextYear}'),
('Turnover Margin (+/-)', '', '', '{$nextYear}'),
('Points Per Game', '', '', '{$nextYear}'),
('Points Against Per Game', '', '', '{$nextYear}'),
('Offensive Red Zone Scoring Percent', '', '', '{$nextYear}'),
('Defensive Red Zone Scoring Percent', '', '', '{$nextYear}'),
('Rushing TDs', '', '', '{$nextYear}'),
('Passing TDs', '', '', '{$nextYear}'),
('Sacks', '', '', '{$nextYear}'),
('Interceptions', '', '', '{$nextYear}'),
('Fumbles Recovered', '', '', '{$nextYear}'),
('Penalties Commited', '', '', '{$nextYear}'),
('Penalty Yards', '', '', '{$nextYear}')";
mysql_query($PopulateTeamStats);


/* Depth Chart Table */
$copyDepthCart = "INSERT INTO `{$fran}_players`
        (`Name`, `Position`, `Overall`, `Age`, `Weapon`, `OnTeam`, `Rookie`, `OSU`, `Historical_ID`, `Year`)
        SELECT `Name`, `Position`, `Overall`, `Age`, `Weapon`, `OnTeam`, `Rookie`, `OSU`, `Historical_ID`, '$nextYear'
        FROM `{$fran}_players` WHERE `Year` = {$previousYear};";
mysql_query($copyDepthCart);

//After Copying Depth Chart Table, Remove Staged Retired Players Based on Position
$getStagedRetiredPlayers = mysql_query("SELECT * FROM `franchise_staging_retired` WHERE Franchise='{$fran}' and Year='{$previousYear}'") or die(mysql_error());
while ($RetiredPlayerRow = mysql_fetch_array($getStagedRetiredPlayers)) {
    $getRetiredPlayerInfo = mysql_query("SELECT * FROM `{$fran}_players` WHERE Row_ID={$RetiredPlayerRow['PlayerRow']}") or die(mysql_error());
    $retiredPlayerObj = mysql_fetch_object($getRetiredPlayerInfo);
    $retiredPOS = $retiredPlayerObj->Position;
    $removeRetiredPlayer = mysql_query("DELETE FROM `{$fran}_players` WHERE Position='{$retiredPOS}' AND Year='{$nextYear}'") or die(mysql_error());
}

$emptyRetiredStagingForFranchise = mysql_query("DELETE FROM `franchise_staging_retired` WHERE Franchise='{$fran}' AND Year={$previousYear}") or die(mysql_error());

$IncrementDepthAge = "UPDATE `{$fran}_players` SET `Age` = `Age` + 1 WHERE `Year` = '$nextYear'";
mysql_query($IncrementDepthAge);

header('Location: ' . $_SERVER['HTTP_REFERER']);
