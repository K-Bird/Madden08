<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$team = $_POST['team'];

if ($team === 'ALL') {
    $UpdatePoolFilter = db_query("UPDATE `master_roster_controls` set Value='' WHERE Control='TeamFilter'");
} else {
    $UpdatePoolFilter = db_query("UPDATE `master_roster_controls` set Value='{$team}' WHERE Control='TeamFilter'");
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

