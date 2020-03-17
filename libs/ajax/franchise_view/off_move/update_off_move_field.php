<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$row = $_POST['row'];
$field = $_POST['field'];
$newVal = $_POST['newVal'];

db_query("Update `franchise_year_off_moves` set `{$field}`='{$newVal}' Where Row='{$row}'");