<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$selected_year = $_POST['selected_year'];

$Update_Curr_Year_View = db_query("Update `franchise_view_controls` set `Value`='{$selected_year}' Where Control='franchise_current_year'");