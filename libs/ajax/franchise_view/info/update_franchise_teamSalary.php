<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_teamSalary_value = $_POST['new_teamSalary_value'];
$franchise = $_POST['franchise'];
$year = $_POST['year'];

$Update_Curr_Fran_View = db_query("Update `franchise_year_info` set `Field_Value`='{$new_teamSalary_value}' Where Field_ID='salary' and franchise='{$franchise}' and Year='{$year}'");