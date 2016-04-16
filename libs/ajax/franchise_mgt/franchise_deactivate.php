<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$fran = $_POST['fran'];

$Deactivte = db_query("UPDATE `franchise_info` SET `Active` = 'N' where `Franchise`='$fran'");

$GetYears = db_query("Select * From `franchise_info` where `Franchise`='$fran'");
$row = $GetYears->fetch_assoc();
$YearNum = $row['CurrentYear'];


$removeAwards = db_query("DELETE FROM `franchise_year_awards` WHERE Team='{$fran}'");
$removeBlock = db_query("DELETE FROM `franchise_year_indv_block` WHERE Team='{$fran}'");
$removeDef = db_query("DELETE FROM `franchise_year_indv_def` WHERE Team='{$fran}'");
$removePassing = db_query("DELETE FROM `franchise_year_indv_passing` WHERE Team='{$fran}'");
$removeRec = db_query("DELETE FROM `franchise_year_indv_rec` WHERE Team='{$fran}'");
$removeRushing = db_query("DELETE FROM `franchise_year_indv_rushing` WHERE Team='{$fran}'");
$removeST = db_query("DELETE FROM `franchise_year_indv_st` WHERE Team='{$fran}'");
$removeInfo = db_query("DELETE FROM `franchise_year_info` WHERE Franchise='{$fran}'");
$removeOffCoach = db_query("DELETE FROM `franchise_year_off_coach` WHERE Team='{$fran}'");
$removeOffMoves = db_query("DELETE FROM `franchise_year_off_moves` WHERE Team='{$fran}'");
$removePreCoach = db_query("DELETE FROM `franchise_year_pre_coaches` WHERE Team='{$fran}'");
$removeProbowl = db_query("DELETE FROM `franchise_year_probowl` WHERE Team='{$fran}'");
$removeResults = db_query("DELETE FROM `franchise_year_results` WHERE Team='{$fran}'");
$removeRoster = db_query("DELETE FROM `franchise_year_roster` WHERE Team='{$fran}'");
$removeTeamStats = db_query("DELETE FROM `franchise_year_teamstats` WHERE Team='{$fran}'");
$removeTraningCamp = db_query("DELETE FROM `franchise_year_trainingcamp` WHERE Franchise='{$fran}'");

$removeStageDrafted = db_query("DELETE FROM `franchise_staging_drafted` WHERE Franchise='{$fran}'");
$removeStageFA = db_query("DELETE FROM `franchise_staging_freeagency` WHERE Franchise='{$fran}'");
$removeStageRet = db_query("DELETE FROM `franchise_staging_retired` WHERE Franchise='{$fran}'");


$SetYear = db_query("UPDATE `franchise_info` SET CurrentYear= '0' where `Franchise`='{$fran}'");


header('Location: ' . $_SERVER['HTTP_REFERER']);

