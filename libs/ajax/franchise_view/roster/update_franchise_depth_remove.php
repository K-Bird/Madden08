<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$positionRemove = $_POST['positionRemove'];

foreach ($positionRemove as $index => $removePos) {
    if ($removePos != '') {
       $delete = db_query("DELETE from `franchise_year_roster` where Row_ID='{$removePos}'");
    } 
}







