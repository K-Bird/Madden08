<?php

include ("../../../../libs/db/common_db_functions.php");

$name = $_POST['name'];
$team = $_POST['team'];
$year = $_POST['year'];
$type = $_POST['type'];

$returnFoundNames = db_query("SELECT * FROM `master_rosters` WHERE concat(firstname, ' ', lastname) LIKE '%$name%' LIMIT 10");

echo '<div id="offFAImportResults">';
echo '<div class="list-group">';

while ($fetchFoundNames = $returnFoundNames->fetch_assoc()) {

    echo '<button id="', $fetchFoundNames['Row_ID'], '" type="button"';

        echo ' class="playerOffFAImportListItem list-group-item list-group-item-action btn-sm"
                data-playerName="' . $fetchFoundNames['firstname'] . ' ' . $fetchFoundNames['lastname'] . '"' .
                ' data-playerPos=' . $fetchFoundNames['position'] .
                ' data-playerOvr=' . $fetchFoundNames['ovr'] .
                ' data-playerAge=' . $fetchFoundNames['age'] .
                ' data-playerRow=' . $fetchFoundNames['Row_ID'] .
                ' data-moveTeam=' . $team .
                ' data-moveYear=' . $year .
                ' data-offType=' . $type .
                '>';
        
    echo '<span class="oi oi-plus" style="float: left"></span>';
    echo "   " . $fetchFoundNames['firstname'] . " " . $fetchFoundNames ['lastname'] . " (Age " .  $fetchFoundNames ['age'] . ") - " . $fetchFoundNames ['team'] . " - " . $fetchFoundNames ['position'] . " "  . $fetchFoundNames ['ovr'] . " ";

    echo '</button>';
}

echo '<div>';
echo '</div>';
