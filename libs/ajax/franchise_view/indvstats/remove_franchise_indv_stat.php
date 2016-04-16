<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$row= $_POST['row'];
$stat = $_POST['stat'];

$removeStat = db_query("DELETE from `franchise_year_indv_{$stat}` where Row='{$row}'");


