<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$row = $_POST['row'];

$removeAward = db_query("DELETE from `franchise_year_probowl` where `Row`='{$row}'");


