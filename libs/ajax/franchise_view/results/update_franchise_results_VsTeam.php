<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_team_value = $_POST['team'];
$row = $_POST['row'];

if ($new_team_value === 'BYE') {
    $Update_VsAt = db_query("Update `franchise_year_results` set `Vs`='{$new_team_value}' Where Row='{$row}'");
} else {
$getTeamMascot = db_query("SELECT * FROM `franchise_info` WHERE Franchise='{$new_team_value}'");
$MascotRow = $getTeamMascot->fetch_assoc();
$Mascot = $MascotRow['Mascot'];

$Update_VsAt = db_query("Update `franchise_year_results` set `Vs`='{$Mascot}' Where Row='{$row}'");
}