<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$change = $_POST['change'];
$Curr_Team = $_POST['fran'];
$View_Year = $_POST['year'];

if ($change === 'Y') {
    db_query("Update `franchise_year_results` SET Result='Y' WHERE Team='{$Curr_Team}' AND Year='{$View_Year}' AND Week='Simulated'");
} else {
    db_query("Update `franchise_year_results` SET Result='N' WHERE Team='{$Curr_Team}' AND Year='{$View_Year}' AND Week='Simulated'");
}
