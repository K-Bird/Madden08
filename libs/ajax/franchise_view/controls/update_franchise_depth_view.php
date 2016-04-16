<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_view_value = $_POST['new_view_value'];

$Update_Curr_Fran_View = db_query("Update `franchise_view_controls` set `Value`='{$new_view_value}' Where Control='franchise_depth_view'");