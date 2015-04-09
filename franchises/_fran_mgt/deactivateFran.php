<?php

$fran = $_POST['fran'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Deactivte = mysql_query("UPDATE `franchise_info` SET `Active` = 'N' where `Franchise`='$fran'", $con) or die(mysql_error());

$GetYears = mysql_query("Select * From `franchise_info` where `Franchise`='$fran'", $con) or die(mysql_error());
$row = mysql_fetch_array($GetYears);
$YearNum = $row['CurrentYear'];

$dropCoachTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_coaches`", $con) or die(mysql_error());
$dropInfoTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_info`", $con) or die(mysql_error());
$dropOffAwardsTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_off_awards`", $con) or die(mysql_error());
$dropCoachChgTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_off_coach-chg`", $con) or die(mysql_error());
$dropOffMovesTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_off_moves`", $con) or die(mysql_error());
$dropOffProbowlTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_off_probowl`", $con) or die(mysql_error());
$dropDepthChartTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_players`", $con) or die(mysql_error());
$dropResultsTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_results`", $con) or die(mysql_error());
$dropStatsBlockTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_stats_block`", $con) or die(mysql_error());
$dropStatsDefTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_stats_def`", $con) or die(mysql_error());
$dropStatsPassingTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_stats_passing`", $con) or die(mysql_error());
$dropStatsRecTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_stats_rec`", $con) or die(mysql_error());
$dropStatsRushingTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_stats_rushing`", $con) or die(mysql_error());
$dropStatsSpecialTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_stats_special`", $con) or die(mysql_error());
$dropTeamStatsTable = mysql_query("DROP TABLE IF EXISTS `{$fran}_teamstats`", $con) or die(mysql_error());

$SetYear = mysql_query("UPDATE `franchise_info` SET `CurrentYear` = '0' where `Franchise`='$fran'", $con) or die(mysql_error());

for ($i = 1; $i <= $YearNum; $i++) {

$dbPath = "../" . $fran . "/Year$i";

foreach (glob($dbPath . '/*') as $file) {
    if (is_dir($file)) {
        rmdir($file);
    } else {
        unlink($file);
    }
} rmdir($dbPath);
}

/* Modify Franchise File */
$GetFullName = mysql_query("Select * From `franchise_info` where `Franchise`='$fran'", $con) or die(mysql_error());
$row = mysql_fetch_array($GetFullName);
$FullName = $row['FullName'];
$PrimaryColor = $row['PrimaryColor'];
$SecondaryColor = $Row['SecondaryColor'];

copy("../_new_fran/Fran_Inactive.php","../" . $fran . "/Fran_Inactive.php");
rename("../" . $fran . "/Fran_Inactive.php","../" . $fran . "/Fran_" . $fran . ".php");
$FranFile = "../../Franchises" . "/" . $fran . "/Fran_" . $fran . ".php";
file_put_contents($FranFile,str_replace('NewFran',$fran,file_get_contents($FranFile)));
file_put_contents($FranFile,str_replace('FullName',$FullName,file_get_contents($FranFile)));


header('Location: ' . $_SERVER['HTTP_REFERER']);

