<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$drill = $_POST['tc_drill'];
$year = $_POST['year'];
$fran = $_POST['franchise'];
$selectedAttr = $_POST['selectedAttr'];
$old_attr = $_POST['old_attr'];
$new_attr = $_POST['new_attr'];
$row = $_POST['row'];

$UpdateDrillTable = db_query("INSERT into `franchise_year_trainingcamp` (Drill, Attr_Name, Old_Attr, New_Attr, Player_Row, Franchise, Year) VALUES ('{$drill}','{$selectedAttr}','{$old_attr}','{$new_attr}','{$row}','{$fran}','{$year}')") or die(mysqli_error());
