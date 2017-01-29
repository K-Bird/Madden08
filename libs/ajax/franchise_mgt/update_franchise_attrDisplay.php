<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$new_attrDisplay_value = $_POST['new_attrDisplay_value'];
$franchise = $_POST['franchise'];

$Update_Fran_attrDisplay = db_query("Update `franchise_info` set `AttrDisplay`='{$new_attrDisplay_value}' Where  franchise='{$franchise}'");