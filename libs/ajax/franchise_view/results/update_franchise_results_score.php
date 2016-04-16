<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_score_value = $_POST['newScore'];
$row = $_POST['row'];

$Update_Score = db_query("Update `franchise_year_results` set `Score`='{$new_score_value}' Where Row='{$row}'");

header('Location: ' . $_SERVER['HTTP_REFERER']);