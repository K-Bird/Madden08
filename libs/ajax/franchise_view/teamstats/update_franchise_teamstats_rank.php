<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_rank_value = $_POST['newRank'];
$row = $_POST['row'];

$Update_Score = db_query("Update `franchise_year_teamstats` set `Rank`='{$new_rank_value}' Where Row='{$row}'");

header('Location: ' . $_SERVER['HTTP_REFERER']);