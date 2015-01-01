<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Receiving History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_stats_rec` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    echo '<div id="', $playerRow['Row'], 'RecTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = mysql_query("Select * From `{$fran}_stats_rec` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

    echo '<tr><td></td><td>Receptions</td><td>Receiving Yards</td><td>Receiving TDs</td><td>Yards Per Catch</td><td>Longest Catch</td><td>Drops</td></tr>';

    while ($recHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

        echo '<tr>'
        . '<td>Year: ', $recHistoryRow['Year'], '</td>'
        . '<td>', $recHistoryRow['Rec'], '</td>'
        . '<td>', $recHistoryRow['Yards'], '</td>'
        . '<td>', $recHistoryRow['TDs'], '</td>'
        . '<td>', $recHistoryRow['YPC'], '</td>'
        . '<td>', $recHistoryRow['LongCatch'], '</td>'
        . '<td>', $recHistoryRow['Drops'], '</td>';

        echo '</tr>';
    }
    echo '</table>
         </div>';
}




