<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_formation_value = $_POST['new_formation_value'];

$Update_Curr_Fran_View = db_query("Update `franchise_view_controls` set `Value`='{$new_formation_value}' Where Control='franchise_depth_formation'");