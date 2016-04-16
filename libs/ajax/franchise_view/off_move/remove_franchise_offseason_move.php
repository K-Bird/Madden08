<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$row = $_POST['row'];

/*
$getMoveInfo = mysql_query("SELECT * FROM `franchise_year_off_moves` where `Row`='{$row}'");
$getMoveInfoRow = $getMoveInfo->fetch_assoc();

if ($getMoveInfoRow['Type'] === 'retired') {
    $getMoveRow = mysql_query("DELETE FROM `franchise_staging_retired` WHERE MoveRow={$row}", $con);
}
if ($getMoveInfoRow['Type'] === 'draft') {
    $getMoveRow = mysql_query("DELETE FROM `franchise_staging_drafted` WHERE MoveRow={$row}", $con);
}
*/

$deleteMove = db_query("DELETE from `franchise_year_off_moves` where Row='{$row}'");