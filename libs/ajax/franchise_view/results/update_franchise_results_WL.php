<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_VsAt_value = $_POST['value'];
$row = $_POST['row'];

$Update_VsAt = db_query("Update `franchise_year_results` set `Result`='{$new_VsAt_value}' Where Row='{$row}'");