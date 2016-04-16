<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_value = $_POST['newValue'];
$row = $_POST['row'];

$Update_Score = db_query("Update `franchise_year_teamstats` set `Value`='{$new_value}' Where Row='{$row}'");

header('Location: ' . $_SERVER['HTTP_REFERER']);