<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Passing History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_stats_passing` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    echo '<div id="', $playerRow['Row'], 'PassTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = mysql_query("Select * From `{$fran}_stats_passing` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

    echo '<tr><td></td><td>Passer Rating</td><td>Passing Yards</td><td>Passing TDs</td><td>Interceptions</td><td>Completion %</td><td>Times Sacked</td></tr>';

    while ($passHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

        echo '<tr>'
        . '<td>Year: ', $passHistoryRow['Year'], '</td>'
        . '<td>', $passHistoryRow['Rating'], '</td>'
        . '<td>', $passHistoryRow['Yards'], '</td>'
        . '<td>', $passHistoryRow['TDs'], '</td>'
        . '<td>', $passHistoryRow['INTs'], '</td>'
        . '<td>', $passHistoryRow['Comp'], '</td>'
        . '<td>', $passHistoryRow['Sacked'], '</td>';

        echo '</tr>';
    }

    echo '</table>
         </div>';
}




