<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$simulated = $_POST['sim_value'];
$franchise = $_POST['franchise'];
$year = $_POST['year'];

$update_simulated = db_query("Update `franchise_year_results` set Vs='{$simulated}' Where Week='Simulated' and Team='{$franchise}' and Year='{$year}'");