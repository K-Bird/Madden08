<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$NewValue = $_POST['NewValue'];
$franchise = $_POST['fran'];
$year = $_POST['year'];
$position = $_POST['position'];

$Update_Curr_Fran_View = db_query("Update `franchise_year_pre_coaches` set `Name`='{$NewValue}' Where Position='{$position}' and Team='{$franchise}' and Year='{$year}'");

header('Location: ' . $_SERVER['HTTP_REFERER']);