<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$display_backups_value = $_POST['display_backups_value'];

$Update_Curr_Fran_View = db_query("Update `franchise_view_controls` set `Value`='{$display_backups_value}' Where Control='franchise_depth_backups'");