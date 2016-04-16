<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$row = $_POST['row'];

$removeDrillRow = db_query("Delete FROM `franchise_year_trainingcamp` WHERE Row_ID='{$row}'") or die(mysqli_error());
