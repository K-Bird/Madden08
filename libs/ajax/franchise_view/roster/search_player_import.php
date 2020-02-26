<?php

include ("../../../../libs/db/common_db_functions.php");

$name = $_POST['name'];
$pos = $_POST['pos'];
$team = $_POST['team'];
$year = $_POST['year'];

$returnFoundNames = db_query("SELECT * FROM `master_rosters` WHERE concat(firstname, ' ', lastname) LIKE '%$name%' LIMIT 10");

echo '<div id="' . $pos . 'ImportResults">';
echo '<div class="list-group">';

while ($fetchFoundNames = $returnFoundNames->fetch_assoc()) {

    echo '<button id="', $fetchFoundNames['Row_ID'], '" type="button"';

        echo ' class="playerImportListItem list-group-item list-group-item-action btn-sm" data-currTeam=' . $team . ' data-viewYear=' . $year . ' data-pos=' . $pos . '>';
        
    echo '<span class="oi oi-plus" style="float: left"></span>';
    echo "   " . $fetchFoundNames['firstname'] . " " . $fetchFoundNames ['lastname'] . " (Age " .  $fetchFoundNames ['age'] . ") - " . $fetchFoundNames ['team'] . " - " . $fetchFoundNames ['position'] . " "  . $fetchFoundNames ['ovr'] . " ";

    echo '</button>';
}

echo '<div>';
echo '</div>';
