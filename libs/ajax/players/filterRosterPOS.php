<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$pos = $_POST['pos'];


if ($pos === 'ALL') {
    $UpdatePoolFilter = db_query("UPDATE `master_roster_controls` set Value='' WHERE Control='PosFilter'");
} else {
    $UpdatePoolFilter = db_query("UPDATE `master_roster_controls` set Value='{$pos}' WHERE Control='PosFilter'");
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

