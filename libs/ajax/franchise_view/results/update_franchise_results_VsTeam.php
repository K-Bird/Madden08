<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_team_value = $_POST['team'];
$row = $_POST['row'];

$getTeamMascot = db_query("SELECT * FROM `franchise_info` WHERE Franchise='{$new_team_value}'");
$MascotRow = $getTeamMascot->fetch_assoc();
$Mascot = $MascotRow['Mascot'];

$Update_VsAt = db_query("Update `franchise_year_results` set `Vs`='{$Mascot}' Where Row='{$row}'");