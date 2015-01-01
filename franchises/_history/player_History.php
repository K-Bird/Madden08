<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Player History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_players` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    echo '<div id="', $playerRow['Row_ID'], 'Table" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = mysql_query("Select * From `{$fran}_players` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

    echo '<tr><td></td><td>Overall</td><td>Age</td><td>Acquired</td><td>Status</td></tr>';

    while ($historyRow = mysql_fetch_array($GetPlayerHistory)) {

        echo '<tr>'
        . '<td>Year: ', $historyRow['Year'], '</td>'
        . '<td>', $historyRow['Overall'], '</td>'
        . '<td>', $historyRow['Age'], '</td>'
        . '<td>', $historyRow['OnTeam'], '</td>';
        if ($historyRow['Weapon'] === "") {
            echo '<td></td>';
        } else {
            echo '<td><img src="../../_weapons/', $historyRow['Weapon'], '.gif" height=25 width=25></td>';
        }
        echo '</tr>';
    }

    echo '</table>
         </div>';
}




