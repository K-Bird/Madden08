<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$franchise_abbrev = $_POST['franchise_abbrev'];

$Update_Curr_Fran_View = db_query("Update `franchise_view_controls` set `Value`='{$franchise_abbrev}' Where Control='franchise_current_team'");
$Update_Curr_Year_View = db_query("Update `franchise_view_controls` set `Value`='1' Where Control='franchise_current_year'");