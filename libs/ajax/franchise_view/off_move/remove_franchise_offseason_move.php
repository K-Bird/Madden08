<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$row = $_POST['row'];
$moveType = $_POST['moveType'];

if ($moveType === 'retired') {
    db_query("DELETE FROM `franchise_staging_retired` WHERE MoveRow='{$row}'");
}
if ($moveType === 'draft') {
    db_query("DELETE FROM `franchise_staging_drafted` WHERE  MoveRow='{$row}'");
}
if ($moveType === 'fa') {
    db_query("DELETE FROM `franchise_staging_freeagency` WHERE MoveRow='{$row}'");
}

$deleteMove = db_query("DELETE from `franchise_year_off_moves` where Row='{$row}'");
